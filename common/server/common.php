<?php
/**
 * Created by PhpStorm.
 * User: hisammy
 * Date: 2016/4/23
 * Time: 15:05
 */

class Common{

    /**
     * 将信息写入日志
     * @param string $title   标题
     * @param string $content 内容
     */
    public  static  function globalLogRecord($title, $content) {
        $date = Date ( 'Y-m-d', time () );
        $path = '/data/wwwlogs/task_log/' . $date . '.log';
        if (! file_exists ( $path )) {
            $fh = fopen ( $path, "w+" );
            fwrite ( $fh, '******************' . $date . ' record' . "\n" . "\n" );
            fclose ( $fh );
        }

        $time = self::microtime_format ( 'Y-m-d  H:i:s:x', self::microtime_float () );
        $str = $time . ":  " . $title . "  " . $content . "\n";
        $handle = fopen ( $path, 'a' );
        fwrite ( $handle, $str );
        fclose ( $handle );
    }



    /**
     * 写入任务失败日志
     * @param string $title   标题
     * @param string $content 内容
     */
    public static function TaskFailLogRecord($title, $content) {
        $date = Date ( 'Y-m-d', time () );
        $path = '/data/wwwlogs/task_log/task_error'.'.log';
        if (! file_exists ( $path )) {
            $fh = fopen ( $path, "w+" );
            fwrite ( $fh, '******************' . $date . ' record' . "\n" . "\n" );
            fclose ( $fh );
        }

        $time = self::microtime_format ( 'Y-m-d  H:i:s:x', self::microtime_float () );
        $str = $time . ":  " . $title . "  " . $content . "\n";
        $handle = fopen ( $path, 'a' );
        fwrite ( $handle, $str );
        fclose ( $handle );
    }



    /**
     * 返回当前时间（毫秒级）
     * @return type
     */
    public  static function microtime_float() {
        list ( $usec, $sec ) = explode ( " ", microtime () );
        return (( float ) $usec + ( float ) $sec);
    }

    /**
     * 格式化时间戳，精确到毫秒，x代表毫秒
     * @param type $tag
     * @param type $time
     * @return type
     */
    public  static function microtime_format($tag, $time) {
        list ( $usec, $sec ) = explode ( ".", $time );
        $date = date ( $tag, $usec );

        $num = strlen($sec);
        for ($i=$num; $i<4; $i++){
            $sec .= '0';
        }

        return str_replace ( 'x', $sec, $date );
    }


}