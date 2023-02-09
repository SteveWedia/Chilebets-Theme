<?php

function page_index() {
    $output = '';
    $titles = get_page_by_class('is-title');
    if (!empty($titles)) {
        $output .= '<section class="content-index"><span class="content-title">På denne siden</span><button class="expand-content" parent="content-index">Utvid</button><ul>';
        foreach ($titles as $title) {
            $output .= '<li><a href="#' . esc_attr($title['id']) . '">' . esc_html($title['content']) . '</a></li>';
        }
        $output .= '</ul></section>';
    }
    return $output;
}
add_shortcode('page-index', 'page_index');

function get_page_by_class($class) {
    global $post;
    $elements = array();
    $dom = new DOMDocument;
    $page_content = mb_convert_encoding($post->post_content, 'HTML-ENTITIES', 'UTF-8');
    $dom->loadHTML($page_content);
    //$dom->loadHTML($post->post_content, 'UTF-8');
    $xpath = new DOMXPath($dom);
    //print_r($xpath);
    $results = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
    //print_r($results);
    if ($results->length > 0) {
        foreach ($results as $result) {
            //print_r($result);
            $elements[] = array(
                'id' => $result->getAttribute('id'),
                'content' => $result->nodeValue,
            );
        }
    }
    return $elements;
}

?>