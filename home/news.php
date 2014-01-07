<?php
	load('news');
	$news = new News();
	$list = Theme_get_news_list($id,$news);
	set_page_id('news');
	get_header(array('title' => '新闻动态'));
?>
<div class="content_resize">
	<div class="mainbar">
		<div class="article">
			<h2><span>欢迎关注</span>计算机系</h2>
			<?php echo get_sys()->get_setting('team_about')?>
			<?php
			foreach($list as $v){
				?>
				<ul class="sb_menu1">
					<li><a href="<?php echo site_url(), "cat/", $v['id'];?>"><strong><?php echo $v['name'];?></strong></a>
						<ul>
							<?php foreach($v['data'] as $v2){ ?>
							<li><a href="<?php echo site_url(), $v2['id']?>.html" title="<?php echo $v2['title'];?>"><?php echo $v2['title'];?></a><span class="right"><?php echo Theme_format_time($v2['time']);?></span></li>

							<?php }?>
						</ul>
					</li>
				</ul><?php
			}
			?>
			<div class="clear"></div>
		</div>
	</div>
	<?php PHome_load('sidebar', array("news" => $news))?>
	<div class="clr"></div>
</div>
<?php get_footer(); ?>