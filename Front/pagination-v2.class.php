<?php
/*
	Pagination-V2  (OOP Style & Bootstrap support)
	developerthai.com  (banchar_pa@yahoo.com)
*/

class PaginationV2 {
	private $previous_text = "&lt;";
	private $next_text = "&gt;";
	private $first_text = "&lt;&lt;";
	private $last_text = "&gt;&gt;";
	private $rows_per_page = 10;
	private $current_page = 1;
	private $start_row = 0;
	private $total_rows = 0;
	private $total_pages = 0;
	private $pagenums_length = 1;
	private $previous_link = "";
	private $next_link = "";
	private $pagenum_links = [];
	private $first_link = "";
	private $last_link = "";
	private $rand=0;
	private $qrystr = "";
	private $stmt_type = "";
	private $bootstrap = false;	
	
	
	function __construct() {
		parse_str($_SERVER['QUERY_STRING'], $this->qrystr);

		if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      		$this->current_page = intval($_GET['page']);
      		if ($this->current_page < 1) {
            		$this->current_page = 1;
      		}
		}

		$this->start_row = ($this->current_page - 1) * $this->rows_per_page;
	}

	private function format_sql($sql, int $rows_per_page=10) {
		if (isset($rows_per_page) && $rows_per_page >= 1) {
			$this->rows_per_page = $rows_per_page;
		} else {
			$this->rows_per_page = 10;
		}

		$this->start_row = ($this->current_page - 1) * $this->rows_per_page;

		$sql =  trim($sql);
		$pat_select = "/^select/i";
		$sql = preg_replace($pat_select, "SELECT SQL_CALC_FOUND_ROWS ", $sql);

		$pat_end_semicolon = "/;*$/i";
		$sql = preg_replace($pat_end_semicolon, "", $sql);
		$sql .= " LIMIT $this->start_row, $this->rows_per_page";

		return $sql;
	}

	private function found_rows(MySQLi $mysqli) {
		$found_rows = @($mysqli->query("SELECT FOUND_ROWS()")) or die($mysqli->error);
		$row = $found_rows->fetch_row();
		$this->total_rows = $row[0];
		$this->total_pages = ceil($this->total_rows / $this->rows_per_page);
	}	

	function query(MySQLi $mysqli, $sql, $rows_per_page=10) {
		 $f_sql = $this->format_sql($sql, $rows_per_page);
		
		$result = @($mysqli->query($f_sql)) or die($mysqli->error);
		
		$this->found_rows($mysqli);
		
		 return $result;
	}

	function stmt_query(MySQLi $mysqli, $sql, int $rows_per_page=10, $type, array $params) {
		$f_sql = $this->format_sql($sql, $rows_per_page);

		$stmt = $mysqli->stmt_init();
		$stmt->prepare($f_sql);
		$stmt->bind_param($type, ...$params);   //PHP 5.6+
		$stmt->execute();
		
		 $result = mysqli_stmt_get_result($stmt);

		$this->found_rows($mysqli);

		 return $result;
	}
	
	private function generate_links($bootstrap=false) {
		if ($this->current_page > $this->total_pages) {
			return [];
		}

		 $this->pagenum_links = [];

		 $half_size = intval($this->pagenums_length / 2) ;
		 if ($half_size < 1) {
			  $half_size = 1;
		 }

		 $pagenum_start = $this->current_page - $half_size;
		 $pagenum_stop = $this->current_page + $half_size;

		 if ($this->pagenums_length % 2 == 0) {
			$pagenum_start++;
		 }

		 if ($pagenum_start < 1) {
			 $pagenum_stop += 1 - $pagenum_start;
			 $pagenum_start = 1;
		 }
		 if ($pagenum_stop > $this->total_pages) {
			  $diff = $pagenum_stop - $this->total_pages;
			  $pagenum_start -= $diff;
			  if ($pagenum_start < 1) {
				   $pagenum_start = 1;
			  }
			  $pagenum_stop = $this->total_pages;
		 }

		$tag_link = ($bootstrap) ? "li" : "a";
		$tag_active = ($bootstrap) ? "li-active" : "span";

		 if (!empty($this->qrystr)) {
			  if (isset($this->qrystr['page'])) {
				   if ($this->current_page > 1) {
					   $this->previous_link = $this->generate_element($tag_link, $this->qrystr['page']-1, $this->previous_text);
					   $this->first_link = $this->generate_element($tag_link, 1, $this->first_text);					   
				   }
				   if ($this->current_page < $this->total_pages) {
					   $this->next_link = $this->generate_element($tag_link, $this->qrystr['page']+1,$this->next_text);
					   $this->last_link = $this->generate_element($tag_link, $this->total_pages, $this->last_text);					   
				   }
				   if ($pagenum_start > 1) {
					   array_push($this->pagenum_links,  $this->generate_element( $tag_link,$pagenum_start-1,"..."));				   
				   }

				   for ($i = $pagenum_start; $i <= $pagenum_stop; $i++) {
					    if ($i == $this->current_page) {
							array_push($this->pagenum_links,  $this->generate_element( $tag_active, $i, $i));						    
					    } else {
						    array_push($this->pagenum_links,   $this->generate_element( $tag_link,$i, $i));						    
					    }
				   }

				   if ($pagenum_stop < $this->total_pages) {
					   array_push($this->pagenum_links,  $this->generate_element( $tag_link,$pagenum_stop+1,"..."));					   
				   }
			  } else {
				   if ($this->current_page > 1) {
						$this->previous_link = $this->generate_element($tag_link,$this->current_page-1,$this->previous_text, "&");
						$this->first_link = $this->generate_element($tag_link,1,$this->first_text, "&");					   
				   }
				   if ($this->current_page < $this->total_pages) {
						$this->next_link = $this->generate_element($tag_link,$this->current_page+1,$this->next_text, "&");
						$this->last_link = $this->generate_element($tag_link,$this->total_pages,$this->last_text, "&");					   
				   }

				   if ($pagenum_start > 1) {
						   array_push($this->pagenum_links, $this->generate_element($tag_link,$pagenum_start-1,"...", "&"));					   
				   }

				   for ($i = $pagenum_start; $i <= $pagenum_stop; $i++) {
					    if ($i == $this->current_page) {
							array_push($this->pagenum_links,   $this->generate_element($tag_active,$i,$i, "&"));						    
					    } else {
						    array_push($this->pagenum_links,   $this->generate_element($tag_link,$i,$i, "&"));						    
					    }
				   }
				   if ($pagenum_stop < $this->total_pages) {
					   array_push($this->pagenum_links,  $this->generate_element($tag_link,$pagenum_stop+1,"...", "&"));		   
				   }
			  }

		 } else {
			  if ($this->current_page > 1) {
					$this->previous_link =  $this->generate_element($tag_link,$this->current_page-1,$this->previous_text, "?");
					$this->first_link =  $this->generate_element($tag_link,1,$this->first_text, "?");				  
			  }
			  if ($this->current_page < $this->total_pages) {
					  $this->next_link = $this->generate_element($tag_link,$this->current_page+1,$this->next_text, "?");
					  $this->last_link =  $this->generate_element($tag_link,$this->total_pages,$this->last_text, "?");			  
			  }

			  if ($pagenum_start > 1) {
					  array_push($this->pagenum_links,  $this->generate_element($tag_link,$pagenum_start-1,"...", "?"));				  
			  }

			  for ($i = $pagenum_start; $i <= $pagenum_stop; $i++) {
				   if ($i == $this->current_page) {
					   array_push($this->pagenum_links,  $this->generate_element($tag_active,$i,$i,"?"));
				   } else {
					   array_push($this->pagenum_links,  $this->generate_element($tag_link,$i,$i,"?"));				                         
				   }
			  }

			  if ($pagenum_stop < $this->total_pages) {
				  array_push($this->pagenum_links,  $this->generate_element($tag_link,$pagenum_stop+1,"...","?"));				  
			  }
		 }
	}

	private function generate_element($e,$p,$t,$q="") {
		 if ($q == "") {
			  $params =  $this->qrystr;
			  $params['page'] = $p;
			  $q = http_build_query($params);
		 } else if ($q == "&") {
			  $q = $_SERVER['QUERY_STRING'] . "&page=$p";
		 } else if ($q == "?") {
			  $q = "page=$p";
		 }
		$href = "{$_SERVER['PHP_SELF']}?$q";
		 if ($e == "a") {
			  return "<a href=\"$href\" class=\"page-$this->rand\">$t</a>";
		 } else if ($e == "span") {
			  return "<span class=\"page-$this->rand\">$t</span>";
		 } else if ($e == "li") {		//Bootstrap
			 return "<li class=\"page-item\"><a class=\"page-link\" href=\"$href\">$t</a></li>";
		 } else if ($e == "li-active") {
			 return "<li class=\"page-item active\"><a class=\"page-link\" href=\"#\">$t</a></li>";
		 }
	}

	function echo_prevnext($show_first_last=false, $show_current_total=false) {
		 $this->page_styles();
		 $this->generate_links();
		 $cur_total = "";
		 if ($this->bool_type($show_current_total)) {
			  $cur_total = "<span class=\"page-$this->rand\">" .$this->current_page() . "/" . $this->total_pages() . "</span>";
		 }
		 $prev_next =  $this->previous_link . $cur_total  . $this->next_link;
		 if (!$this->bool_type($show_first_last)) {
			  echo $prev_next;
		 } else {
			  echo $this->first_link . $prev_next . $this->last_link;
		 }
	}

	function echo_pagenums($pagenums_length=5, $show_prev_next=true, $show_first_last=true) {
		 if (is_numeric($pagenums_length)) {
			  $this->pagenums_length = $pagenums_length;
		 } else {
			  $this->pagenums_length = 5;
		 }

		if (!$this->bootstrap) {
			$this->page_styles();
			$this->generate_links();
		} else {
			$this->generate_links(true);
			echo '<ul class="pagination justify-content-center">';
		}

		 if ($this->bool_type($show_prev_next)) {
			  $prev_next = $this->previous_link . implode("", $this->pagenum_links)  . $this->next_link;
			  if ($this->bool_type($show_first_last)) {
				   echo $this->first_link . $prev_next . $this->last_link;
			  } else {
				   echo $prev_next;
			  }
		 } else {
			  if ($this->bool_type($show_first_last)) {
				   echo  $this->first_link . implode("", $this->pagenum_links) . $this->last_link;
			  } else {
				   echo implode("", $this->pagenum_links);
			  }
		 }

		if ($this->bootstrap) {
			echo '</ul>';
		}
	}

	function echo_pagenums_bootstrap($page_size=5, $show_prevnext=true, $show_first_last=false) {
		$this->bootstrap = true;
		$this->echo_pagenums($page_size, $show_prevnext, $show_first_last);
	}

	function prevnext_text($prev_text, $next_text) {
		 if (strlen(trim($prev_text)) > 0) {
			  $this->previous_text = $prev_text;
		 }
		 if (strlen(trim($next_text)) > 0) {
			  $this->next_text = $next_text;
		 }
	}

	function first_last_text($first_text, $last_text) {
		 if (strlen(trim($first_text)) > 0) {
			  $this->first_text = $first_text;
		 }
		 if (strlen(trim($last_text)) > 0) {
			  $this->last_text = $last_text;
		 }
	}

	function current_page() {
		 return $this->current_page;
	}

	function total_pages() {
		 return $this->total_pages;
	}

	function start_row() {
		 return $this->start_row + 1;
	}

	function stop_row() {
		 if ($this->start_row + $this->rows_per_page < $this->total_rows) {
			  return $this->start_row + $this->rows_per_page;
		 } else {
			  return $this->total_rows;
		 }
	}

	function total_rows() {
		 return $this->total_rows;
	}

	private $border_style = "none";
	private $border_width = "0px";
	private $border_color = "inherit";
	private $border_radius = "4px";
	private $bg_color = "inherit";
	private $bg_hover_color = "inherit";
	private $font_size = "inherit";
	private $font_bold = "normal";
	private $font_italic = "normal";
	private $text_decoration = "none";
	private $font_family = "inherit";
	private $color = "#00f";
	private $hover_color = "#f00";
	private $cur_border_style = "none";
	private $cur_border_width = "0px";
	private $cur_border_color = "inherit";
	private $cur_bg_color = "inherit";
	private $cur_color = "inherit";

	function link_border($style, $width, $color) {
		 $this->border_style = $style;
		 if (is_numeric($width)) { 
			  $width .= "px"; 
		 }
		 $this->border_width = $width;
		 $this->border_color = $color;
	}

	function current_border($style, $width, $color) {
		 $this->cur_border_style = $style;
		 if (is_numeric($width)) { 
			  $width .= "px"; 
		 }
		$this->cur_border_width = $width;
		$this->cur_border_color = $color;
	}

	function border_radius($radius) {
		 if (is_numeric($radius)) { 
			  $radius .= "px"; 
		 }
		 $this->border_radius = $radius;
	}

	function link_bg_color($bg_color, $bg_hover_color="inherit") {
		 $this->bg_color = $bg_color;
		 $this->bg_hover_color = $bg_hover_color;
	}

	function current_bg_color($bg_color) {
		 $this->cur_bg_color = $bg_color;
	}

	function link_color($color, $hover_color="inherit") {
		 $this->color = $color;
		 $this->hover_color = $hover_color;
	}

	function current_color($color) {
		 $this->cur_color = $color;
	}

	function font($size, $is_bold=false, $is_italic=false, $is_underline=false, $family="inherit") {
		 if (isset($size) && is_numeric($size)) { 
			  $size .= "px"; 
		 }
		 $_font_size = $size;
		 if (isset($is_bold) && $this->bool_type($is_bold)) { 
			  $_font_bold = "bold"; 
		 }

		 if (isset($is_italic) && $this->bool_type($is_italic)) { 
			  $_font_italic = "italic"; 
		 }

		 if (isset($is_underline) && $this->bool_type($is_underline)) { 
			  $_text_decoration = "underline"; 
		 } 
		 $_font_family = $family;
	}

	private function bool_type($var) {
		 if (gettype($var) == "boolean" && $var == true) {
			  return true;
		 } else if (gettype($var) == "string") {
			  if (strtolower($var) == "true") {
				   return true;
			  }
		 }
		 return false;
	}

	private function page_styles() {
		 $rand = 0;
		 do {
			  $rand = rand();
		 } while ($rand == $this->rand);
		
		 $this->rand = $rand;
		
		 echo "<style>
				   a.page-$this->rand {
					    color: $this->color;
					    border: $this->border_style $this->border_width $this->border_color;
					    background: $this->bg_color;		    
				   }
				   a.page-$this->rand:hover {
					    color: $this->hover_color;
					    background: $this->bg_hover_color;
				   }
				   span.page-$this->rand {
					    color: $this->cur_color;
					    border: $this->cur_border_style $this->cur_border_width $this->cur_border_color;
					    background: $this->cur_bg_color;
				   }
				   a.page-$this->rand, span.page-$this->rand {
					    font: $this->font_bold $this->font_italic normal $this->font_size $this->font_family;
					    font-size: $this->font_size;
					    border-radius: $this->border_radius;
					    padding: 3px 5px;
					    margin: 3px 5px;
					    text-decoration: $this->text_decoration;
				   }
				  </style>";
	}
	
}
?>