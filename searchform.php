<?php
// Template for the actual search form.

$cats = [
  'recipes' => 153,
  'blog' => 149,
  'cars' => 154
];
?>


<form action="/" method="get">


  <input type="hidden" name="cat" value="<?php echo $cats['recipes']; ?>">
  
  <label for="search">Search</label>
  <input type="text" name="s" id="search" value="<?php the_search_query();?>" required>

  <button type="submit">Search</button>
</form>