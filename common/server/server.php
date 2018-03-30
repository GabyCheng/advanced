<?php
/**
 * Created by PhpStorm.
 * User: hisammy
 * Date: 2016/4/13
 * Time: 22:56
 */


require_once('common.php');


class Server
{

    private $serv;


    public function __construct() {

        $this->serv = new swoole_server("0.0.0.0", 9502);
        $this->serv->set(array(
            'worker_num' => 4,   //一般设置为服务器CPU数的1-4倍
            'daemonize' => 1,  //以守护进程执行
            'max_request' => 5000,
            'dispatch_mode' => 2,
            'task_worker_num' => 1,  //task进程的数量
            "task_ipc_mode " => 3 ,  //使用消息队列通信，并设置为争抢模式
            "log_file" => "/data/wwwlogs/task.log" ,//日志
        ));
        $this->serv->on('WorkerStart', array($this, 'onWorkerStart'));
        $this->serv->on('Receive', array($this, 'onReceive'));
        $this->serv->on('Task', array($this, 'onTask'));
        $this->serv->on('Finish', array($this, 'onFinish'));
        $this->serv->start();

    }

    public function onWorkerStart($serv,$worker_id)
    {
        Common::globalLogRecord('onWorkerStart',"Worker_id :$worker_id");
    }

    public function onReceive( swoole_server $serv, $fd, $from_id, $rdata ) {


        Common::globalLogRecord('onReceive',"Get Message From Client fd={$fd}:data={$rdata}\n");

        $serv->task($rdata);
    }

    public function onTask($serv,$task_id,$from_id, $rdata) {

        Common::globalLogRecord('onTask',"onTask:task_id={$task_id} \n");

        $data =json_decode($rdata,true);

        if(isset($data['type'])){

            switch($data['type']){
                case 'cmd':
                    if(is_array($data['params'])){

                        foreach ($data['params'] as $pa){
                            exec($pa, $res);
                            $res = json_encode($res);
                            Common::globalLogRecord("onCmd:task_id={$task_id}","$res \n");
                        }
                    }
                    break;
                default:
                    return false;
                    break;
            }
        }
        else{

            Common::globalLogRecord('onTaskError',"onTask:task_id={$task_id} data type error \n");

        }



    }


    public function onFinish($serv,$task_id, $data) {

        $response = '';
        $response .= "onFinish Task {$task_id} finish \n";
        $response .="Result:".json_encode($data)."\n";

        Common::globalLogRecord('onFinish',$response);

        //$serv->send($data['fd'],$response);
    }


//    public function onClose($serv, $fd, $from_id)
//    {
//
//        $res =  "Client {$fd}: Close.\n";
//        Common::globalLogRecord('onClose',$res);
//
//    }


}

$server = new Server();