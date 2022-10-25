<?php
class LatestPosts
{
    public function __construct()
    {
        add_action( 'init', array( $this, 'vcMap' ) );
        add_shortcode( 'vc_latest_posts', array( $this, 'render' ) );
    }

    public function vcMap()
    {
        vc_map(array(
            "name" => "Latest Posts",
            "base" => 'vc_latest_posts',
            "category" => 'Webomnizz Elements',
            "allowed_container_element" => 'vc_row',
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => "Number of Posts",
                    "param_name" => "number_of_posts",
                    "admin_label" => true
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Order By",
                    "param_name" => "order_by",
                    "value" => array(
                        "Title" => "title",
                        "Date" => "date"
                    ),
                    'save_always' => true,
                    "admin_label" => true
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Order",
                    "param_name" => "order",
                    "value" => array(
                        "ASC" => "ASC",
                        "DESC" => "DESC"
                    ),
                    'save_always' => true,
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Category Slug",
                    "param_name" => "category",
                    "description" => "Leave empty for all or use comma for list",
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Text length",
                    "param_name" => "text_length",
                    "description" => "Number of characters"
                ),
            )
        ));
    }

    public function render($atts, $content = null)
    {
        $args = array(
            "number_of_posts"       => "",
			"order_by"              => "",
			"order"                 => "",
			"category"              => "",
			"text_length"           => "",
        );

        $params	= shortcode_atts($args, $atts);

        $query = new \WP_Query(
            array('orderby' => $params['order_by'], 'order' => $params['order'], 'posts_per_page' => $params['number_of_posts'], 'category_name' => $params['category'])
        );

        $html = '<div class="lp-holder">';
        $html .= '<ul>';

        while ($query->have_posts()) : $query->the_post();
            $html .= '<li>
                <div class="latest_post">
                    <h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2>
                    '.wp_kses_post($this->getExcerpt(get_the_ID(), $params['text_length'])).'
                </div>
            </li>';
        endwhile;

        $html .= '</ul>
        </div>';

        return $html;
    }

    public function getExcerpt($postId, $text_length = 100)
    {
        $excerpt = '';

		if($text_length !== '0') {
			$excerpt .= '<p class="excerpt">';
			$excerpt .= $text_length > 0 ? mb_substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt($postId);
			$excerpt .= '...</p>';
		}

		return $excerpt;
    }
}
