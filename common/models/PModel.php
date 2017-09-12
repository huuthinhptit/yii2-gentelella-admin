<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 28/10/2016
 * Time: 9:48 SA
 */

namespace common\models;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Yii;
use yii\base\Exception;

class PModel
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    public static function getListStatus()
    {
        return array(
            self::STATUS_ENABLE => 'Enable',
            self::STATUS_DISABLE => 'Disable',
        );
    }

    public static function getStatusName($status){
        $arr = PModel::getListStatus();
        if (isset($arr[$status])) {
            return $arr[$status];
        } else {
            return "N/A";
        }
    }

    /**
     * Display avatar using thumb
     */
    public static function getAvatar($file)
    {
        return (strpos($file, "http://") === FALSE ? self::getResize($file, 420, 253) : $file);
    }

    /**
     *
     * @param $src
     * @param $width
     * @param $height
     * @param int $quality
     * @return string
     */
    public static function getThumbUrl($src, $width, $height, $quality = 100) {
        if (empty($src)) {
            return "http://placehold.it/" . $width ."x" .$height;
        }
        $path = "http://cdn.datingapp.gdcvn.com/timthumb.php?src=" . $src . "&w=" . $width . '&h=' . $height . '&q=' . $quality;
        return $path;

    }

    /**
     *
     * @param $src
     * @param $width
     * @param $height
     * @param int $quality
     * @return string
     */
    public static function getResize($src, $width, $height, $quality = 80){
        if (empty($src)) {
            return "http://placehold.it/" . $width ."x" .$height;
        }
        $path = "http://cdn.datingapp.gdcvn.com/resize/" . $width ."x" .$height .$src;
        return $path;

    }
}