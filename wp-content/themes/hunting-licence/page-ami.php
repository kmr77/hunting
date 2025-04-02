<?php 
/*
Template Name: あみ
*/
get_header(); ?>
<div class="inner">
        <nav class="breadcrumb">
          <ul>
            <li>
              <a href="index.html">狩猟免許過去問</a>
            </li>
            <li>
              <a>網猟 過去問</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="main-visual ami">
      <div class="inner">
        <h1>網猟のみ｜狩猟免許試験過去問集</h1>
        <p>狩猟免許試験の過去問題を猟具ごとに整理し、全ての問題に答えと詳しい解説を網羅しています。また、スマートフォン対応により、移動中やテスト直前でも手軽に復習できる設計となっており、効率的な暗記や知識の定着に役立ちます。これにより、狩猟免許試験の準備をいつでもどこでも進めることができ、受験者が合格に向けた学習を効率的に行えるようサポートしています。</p>
      </div>
    </div>
    <div class="inner">
      <h2>練習問題</h2>
        <p>狩猟免許試験は、法令関連の問題が
          <strong>全30問中13問</strong>出題されます。言葉が難しかったり紛らわしいものもありますが、法令関連の出来が合否をわけますのでしっかり準備しましょう。今回は
          <strong>網猟</strong>だけに出題される問題を練習します。全猟種共通の問題は
          <a href="hourei.html" target="_blank">こちら</a>で見ることができます。</p>
        <p>2024年の例題集から抜粋していますので、法律が改訂されたりして答えが違う場合はご指摘いただけると幸いです。</p>
        <p class="annotation">※問題文をクリックすると解答が表示されます。</p>
        <!-- 問題ここから -->
        <div class="accordion-inner">
          <dl id="accordion">
          <?php
            // 投稿のループを開始
            $args = array(
                'post_type' => 'post',  // 投稿タイプが 'post' のもの
                'posts_per_page' => -1, // すべての投稿を表示
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
                    // カスタムフィールド「title」の取得
                    $custom_title = get_post_meta(get_the_ID(), 'title', true);
                    
                    if ($custom_title) :
                        ?>
                    <dt>
                        <span class="question">問<?php the_field('no'); ?>：<?php the_field('title'); ?></span>
                        <button class="openclose-btn">選択肢を開閉</button>
                    </dt>
                    <dd>
                        <dl>
                            <dt class="select-dt">
                                <ul>
                                    <li>ア：<?php the_field('select_a'); ?></li>
                                    <li>イ：<?php the_field('select_i'); ?></li>
                                    <li>ウ：<?php the_field('select_u'); ?></li>
                                </ul>
                                <button class="answer-btn">答えを開閉</button>
                            </dt>
                            <dd class="answer-dd">
                                <span class="answer">答）<?php the_field('answer'); ?><br>
                                <?php the_field('answer_body'); ?></span>
                            </dd>
                        </dl>
                        <!-- <a href=""><button class="edit-btn">編集</button></a> -->
                    </dd>
                    <?php
                    endif;
                endwhile;
            else :
                echo '<p>投稿が見つかりませんでした。</p>';
            endif;

            // 投稿ループをリセット
            wp_reset_postdata();
            ?>
          </dl>
      </div>

<?php get_footer(); ?>
