<div id="bannerslider" class="{if ($bannernum > 1 || $bannernum==-1) && $bannerslide}slide{else}static{/if}{if $bannercarousel} carousel{/if}" data-pause-on-hover="{$bannercarouselpause}" data-delay="{$bannerinterval}">
    <div {if $bannercarousel}class="carousel-inner"{else}id="imageContainer"{/if}>
        <!-- Carousel items -->
        {foreach from=$bannerimages key=k item=b}<div class="item{if $k==0} active{/if}"{if !$bannercarousel && $k>0 && $bannerslide} style="display: none"{/if}>{if $b.link}
            <a href="{$b.link}">{/if}
            <img src="{$SITEURL}/images/{$bannersize}/bannerimages/{$b.src}"  alt=""{if $b.caption} title="{$b.caption}"{/if} />
            {if $b.link}</a>
            {/if}
            <div class="carousel-caption">
                {if $bannertitles}<div class="slidetitle">
                    <h2>{$b.name}</h2>
                </div>
                {/if}{if $bannercaptions}
                <div class="slidecaption">
                    <p>{$b.caption}</p>
                </div>
                {/if}
            </div>
        </div>
        {/foreach}
    </div>
    {if $bannercarousel && $bannernum>1}
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#bannerslider" data-slide="prev"{if !$bannercarouselnav} style="display:none;"{/if}><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="carousel-control right" href="#bannerslider" data-slide="next"{if !$bannercarouselnav} style="display:none;"{/if}><span class="glyphicon glyphicon-chevron-right"></span></a>
    {if $bannercarouselindicators}
      <!-- Indicators -->
      <ol class="carousel-indicators">
        {foreach from=$bannerimages key=k item=b}<li data-target="#bannerslider" data-slide-to="{$k}"{if $k==0} class="active"{/if}></li>
        {/foreach}
      </ol>
      {/if}{/if}
</div>

