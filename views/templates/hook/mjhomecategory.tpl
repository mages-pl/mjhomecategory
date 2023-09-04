{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}


<div class="home-category-banner">
<div class="row">
<div class="col-lg-9">

<div class="row">
<div class="col-lg-8">
<div class="banner-slodkie-inspiracje category-banner" {if !empty($banner1_image)} style="background-image:url({$banner1_image});" {/if}>

<h1>{$banner1_title}</h1>
<h2>{$banner1_subtitle}</h2>
</div>
</div>

<div class="col-lg-4">
<div class="banner-naturalne-czekolady category-banner" {if !empty($banner2_image)} style="background-image:url({$banner2_image});" {/if}>
<h3>{$banner2_title}</h3>
<h1>{$banner2_subtitle}</h1>
<p>34 produkty</p>
{if !empty($banner2_link)}
<a href="{$banner2_link}" class="btn btn-primary">Sprawdź</a>
{/if}
</div>
</div>

<div class="row">
<div class="col-lg-4">
<div class="banner-nieograniczone-mozliwosci category-banner" {if !empty($banner5_image)} style="background-image:url({$banner5_image});" {/if}>
<h1>{$banner5_title}</h1>
<h2>{$banner5_subtitle}</h2>
</div>
</div>
<div class="col-lg-8">
<div class="banner-ulatwiamy-tworzenie category-banner" {if !empty($banner4_image)} style="background-image:url({$banner4_image});" {/if}>
<h1>{$banner4_title}</h1>
<h2>{$banner4_subtitle}</h2>
</div>
</div>
</div>

</div>

</div>
<div class="col-lg-3">
<div class="banner-tworcza-pasja category-banner" {if !empty($banner3_image)} style="background-image:url({$banner3_image});" {/if}>
<h1>{$banner3_title}</h1>
<h2>{$banner3_subtitle}</h2>
</div>
</div>

</div>
</div>