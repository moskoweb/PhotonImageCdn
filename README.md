# Photon Image CDN Laravel

CDN from Photon (Automattic) to Laravel.

A practical and quick way to use Automattic CDN, created for WordPress, next to your Laravel project.

With Photon's CDN, you have a web-optimized image, removing all unnecessary information for the web, in addition to high speed and low latency.

## Install

Add the service provider to the providers array and alias to the aliases array in config/app.php.

```
'providers' => [
    AlanMosko\PhotonImageCdn\PhotonImageCdnServiceProvider::class,
],
```
 
```
'aliases' => [
    'ImgCdn' => AlanMosko\PhotonImageCdn\Helpers\PhotonImageCdnHelper::class,,
],
```

Publish the configuration:

```
php artisan vendor:publish
```

## Usage

So you can use the images through the Photon CDN is very simple.

You have two options for using the images, one being just to get the new URL of your image in Photon.

And the other way, is by creating the tag directly with the Photon URL.

```
// Image URL
<img src="{{ ImgCdn::url('https://picsum.photos/1000/500/', '500px', '200px') }}">

// Image Tag
{!! ImgCdn::tag('https://picsum.photos/1000/500/', 'Imagem de Teste') !!}
```

## Config

```
return [
    'quality' => 70, // Quality of image requested for Photon
    'max_width' => null,
    'max_height' => null,
    'server' => '3' // 0-3 or random
];
```