<div id="bannerslider"{if $bannercarousel} class="carousel slide"{/if}>
    <div {if $bannercarousel}class="carousel-inner"{else}id="imageContainer"{if $bannernum==1 || !$bannerslide} class="no-slide"{/if}{/if}>
        <!-- Carousel items -->
        {foreach from=$bannerimages key=k item=b}<div class="item{if $k==0} active{/if}"{if !$bannercarousel && $k>0 && $bannerslide} style="display: none"{/if}>{if $b.link}<a href="{$b.link}">{/if}<img src="{$SITEURL}/images/{$bannersize}/bannerimages/{$b.src}"  alt=""{if $b.caption} title="{$b.caption}"{/if} />{if $b.link}</a>{/if}</div>
        {/foreach}
    </div>
    {if $bannercarousel}
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#bannerslider" data-slide="prev"{if !$bannercarouselnav} style="display:none;"{/if}>&lsaquo;</a>
    <a class="carousel-control right" href="#bannerslider" data-slide="next"{if !$bannercarouselnav} style="display:none;"{/if}>&rsaquo;</a>
    {elseif $bannercaptions}
    <!-- Image captions -->
    <div id='caption' class="caption">
        {$bannerimages[0].caption}
    </div>
    {/if}
</div>

{if ($bannernum > 1 || $bannernum==-1) && $bannerslide}<script type="text/javascript">
/*<![CDATA[*/
var slidedelay = {$bannerinterval};
var fadedelay = 2000;
$(document).ready(function() {ldelim}
{if $bannercarousel}
    $('#bannerslider').carousel({ldelim}
        interval: {$bannerinterval},
        pause: '{$bannercarouselpause}'
    {rdelim});
{else}
    $('#imageContainer').children(':first-child').addClass("showbanner");
    setTimeout(nextSlide, slidedelay);
{/if}
{rdelim});
/*]]>*/
</script>
{/if}


