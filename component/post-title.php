<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="mx-1 flex flex-col">
    <div></div>
    <?php while ($this->next()): ?>
        <div class="flex flex-row" itemscope itemtype="https://schema.org/NewsArticle">
            <div class="mr-3 flex flex-1 flex-col justify-center gap-y-3">
                <h1 class="text-2xl font-semibold" itemprop="headline">
                    <?php $this->title() ?>
                </h1>
                <div>
                    <?php $this->category('·', true, '无'); ?>
                    <span class="text-neutral-500"> · <?php echo getHumanizedDate($this->created); ?></span>
                </div>
                <span class="hidden" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <meta itemprop="url" content="<?php $this->author->permalink(); ?>"/>
                    <a itemprop="url" href="<?php $this->author->permalink(); ?>">
                        <span itemprop="name"><?php $this->author->screenName(); ?></span>
                    </a>
                </span>
            </div>
            <?php if ($thumbnail = getThumbnail($this->cid, '')): ?>
                <meta itemprop="image" content="<?php echo $thumbnail; ?>"/>
                <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" class="w-[170px]">
                    <img src="<?php echo $thumbnail; ?>" alt="<?php $this->title() ?>" width="130"
                         height="90"
                         class="h-[130px] w-[170px] rounded object-cover"/>
                </a>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</div>