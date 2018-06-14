<?php

namespace AlanMosko\PhotonImageCdn\Helpers;

class PhotonImageCdnHelper
{
    /**
     * @param string $url
     * @param int $max_width
     * @param int $max_height
     * 
     * @return string
     */
    public static function url( $url, $max_width = null, $max_height = null ) {
        if ( $max_width == null ) {
            $max_width = config('photon-image-cdn.max_width');
        }
        if ( $max_height == null ) {
            $max_height = config('photon-image-cdn.max_height');
        }
        if ( config('photon-image-cdn.server') == 'random' ) {
            $server = rand(0,3);
        } else {
            $server = config('photon-image-cdn.server');
        }

        if ( starts_with( $url, 'https://' ) ) {
            $url = str_replace_first('https://', 'https://i' . $server .'.wp.com/', $url);
        } else {
            $url = str_replace_first('http://', 'https://i' . $server .'.wp.com/', $url);
        }

        if ( str_contains( $url, '?' ) ) {
            $url = str_finish( $url, '&strip=all&quality=' . config('photon-image-cdn.quality') );
        } else {
            $url = str_finish( $url, '?strip=all&quality=' . config('photon-image-cdn.quality') );
        }

        if ( $max_width != null ) {
            $url = str_finish( $url, '&w=' . $max_width );
        }

        if ( $max_height != null ) {
            $url = str_finish( $url, '&h=' . $max_height );
        }
        return $url;
    }

    /**
     * @param string $url
     * @param string $alt
     * @param string $url
     * @param int $max_width
     * @param int $max_height
     * 
     * @return string
     */
    public static function tag ( $url, $alt = null, $max_width = null, $max_height = null ) {
        if ( $max_width == null ) {
            $max_width = config('photon-image-cdn.max_width');
        }
        if ( $max_height == null ) {
            $max_height = config('photon-image-cdn.max_height');
        }
        $img = PhotonImageCdnHelper::url( $url, $max_width, $max_height );
        return "<img src='{$img}' alt='{$alt}' " . ($max_width == null ? '' : "width='{$max_width}'") . " " . ($max_height == null ? '' : "height='{$max_height}'") . "/>";
    }
}
