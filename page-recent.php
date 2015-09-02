<?php /* Template Name: Recent Issues */ ?>
 
<?php get_header(); ?>

<div class="fixed-nav-padding">
<div class="content" role="main">

<select id="" onchange="recent_issues_onchange(this.value)">
<?php foreach(range(2013, date("Y")) as $year) : ?>
	<option value="<?php $year ?>"><?php $year ?></option>
<?php endforeach; ?>
</select>

<script>
	function recent_issues_onchange(value) {
	}
</script>

</div><!-- fixed-nav-padding -->
</div><!-- content -->
