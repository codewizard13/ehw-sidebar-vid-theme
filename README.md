| INFO PROPERTY | VALUE                                                |
| ------------- | ---------------------------------------------------- |
| Program Name  | **EHW Right-Sidebar WordPress Theme (from scratch)** |
| Project Type  | WordPress Theme                                      |
| File Name     | README.md                                            |
| Date Created  | 02/18/2025                                           |
| Date Modified | 02/21/2025                                                   |
| Version       | 00.01.02                                             |
| Programmer    | **Eric Hepperle**                                    |

### GITHUB REPO

- https://github.com/codewizard13/ehw-sidebar-vid-theme.git

### TECHNOLOGIES

<img align="left" alt="WordPress" title="WordPress" width="26px" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-original.svg" style="padding-right:10px;" />

<img align="left" alt="HTML5" title="HTML5" width="26px" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" style="padding-right:10px;" />

<img align="left" alt="CSS3" title="CSS3" width="26px" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" style="padding-right:10px;" />

<img align="left" alt="JavaScript" title="JavaScript" width="26px" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" style="padding-right:10px;" />

<img align="left" alt="PHP" title="PHP" width="26px" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" style="padding-right:10px;" />

<img align="left" alt="MySQL" title="MySQL" width="26px" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" style="padding-right:10px;" />

<img align="left" alt="Git" title="Git" width="26px" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" style="padding-right:10px;" />

<img align="left" alt="GitHub" title="GitHub" width="26px" src="https://user-images.githubusercontent.com/3369400/139448065-39a229ba-4b06-434b-bc67-616e2ed80c8f.png" style="padding-right:10px;" />


<br>

## SCREENSHOTS

### single-cars.php

**_This is a single post template for the 'cars' custom post type created following Mr Digital's excellent tutorial. This version includes a WPForms enquiry form styled with CSS (Vid. 11)_**

![This is a single post template for the 'cars' custom post type created following Mr Digital's excellent tutorial. This version includes a WPForms enquiry form styled with CSS (Vid. 11)](/pix/screen-ES-Site-Rebuild-2025-001--15--single-cars.jpg)


## CODE

**_Heres a code snippet I created with the help of Perplexity AI that lets me display and use ACF fields as custom dynamic tags in WPForms_**

- Add to functions.php or a custom plugin

```php
/**
 * Summary of dynamic_acf_smart_tags:
 * 
 * - Not sure why this works, but it does. Perplexity AI helped.
 * @param mixed $tags
 * 
 * Ref:
 * - https://www.perplexity.ai/search/i-m-trying-to-include-an-acf-c-bDVrWF9dQamDSSUNDcJonA
 */
function dynamic_acf_smart_tags($tags) {
	$tags['acf_field'] = 'ACF Field';
	return $tags;
}
add_filter('wpforms_smart_tags', 'dynamic_acf_smart_tags');

function process_dynamic_acf_smart_tags($content, $tag) {
	if (strpos($tag, 'acf_field_') === 0) {
			$field_name = str_replace('acf_field_', '', $tag);
			$field_value = get_field($field_name, get_the_ID());
			$content = str_replace('{acf_field_' . $field_name . '}', $field_value, $content);
	}
	return $content;
}
add_filter('wpforms_smart_tag_process', 'process_dynamic_acf_smart_tags', 10, 2);
```

## TAGS

`Tutwrk` `WordPress` `WordPress Themes` `Themes from Scratch` `Eric Hepperle` `Mr Digital` `WordPress Classic Theme` `WPForms` `Forms Plugin`


## PURPOSE

This is a custom theme I'm creating for ElijahStreams.com in 2025 to replace the Elementor-based page-builder Astra child theme the client has outgrown. I'm following some tutorials and courses to fast-track my knowledge and level-up my "theme-from-scratch" theme building skills.

## REFERENCES

- [WordPress Theme Development From Scratch](https://www.youtube.com/watch?v=n3EcEYFgyrQ&list=PLgFB6lmeXFOpHnNmQ4fdIYA5X_9XhjJ9d)
- [WordPress Tutorial 1: Introduction](https://www.youtube.com/watch?v=8OBfr46Y0cQ&list=PLpcSpRrAaOaqMA4RdhSnnNcaqOVpX7qi5)
- [How to convert an HTML Template to a WordPress Theme (2019)](https://www.youtube.com/watch?v=FN5jhyspVXc)