<main>
  <section class="section">
    <div class="container">
      <div class="main-news">
        <h1>ข่าวล่าสุด</h1>
      </div>
      <div class="row no-gutters-lg">
        <div class="col-xl-8 mb-5 mb-lg-0">
          <div class="row">
            <?php
            // connect db
            require 'server.php';

            // select data
            $sql = "SELECT * from news ORDER BY UploadDate DESC LIMIT 5";
            $result = $mysqli->query($sql);

            if ($result) {
              $count = 0;
              while ($dbarr = $result->fetch_assoc()) {
                $id = $dbarr['id'];
                $topic = $dbarr['topic'];
                $descr = $dbarr['descr'];
                $UploadDate = $dbarr['UploadDate'];
                $category = $dbarr['category'];
                $img = $dbarr['img'];

                if ($count == 0) { ?>
                  <!-- main news -->
                  <div class="col-12 mb-4">
                    <article class="card article-card">
                      <a href="article.html">
                        <div class="card-image">
                          <div class="post-info">
                            <span class="text-uppercase"><?= $UploadDate ?></span>
                          </div>
                          <img loading="lazy" decoding="async" src="<?= $img ?>" alt="Post Thumbnail" class="w-100">
                        </div>
                      </a>
                      <div class="card-body px-0 pb-1">
                        <ul class="post-meta mb-2">
                          <li>
                            <a href="<?php echo $category ?>_news.php"><?= $category ?></a>
                          </li>
                        </ul>
                        <h2>
                          <a class="post-title" href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                        </h2>
                        <p class="card-text"><?= $descr ?></p>
                      </div>
                    </article>
                  </div>
                <?php
                } else { ?>
                  <!-- news -->
                  <div class="col-md-6 mb-4">
                    <article class="card article-card article-card-sm h-100">
                      <a href="article.html">
                        <div class="card-image">
                          <div class="post-info">
                            <span class="text-uppercase"><?= $UploadDate ?></span>
                          </div>
                          <img loading="lazy" decoding="async" src="<?= $img ?>" alt="Post Thumbnail" class="w-100">
                        </div>
                      </a>
                      <div class="card-body px-0 pb-0">
                        <ul class="post-meta mb-2">
                          <li>
                            <a href="<?php echo $category ?>_news.php"><?= $category ?></a>
                          </li>
                        </ul>
                        <h2>
                          <a class="post-title" href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                        </h2>
                        <p class="card-text"><?= $descr ?></p>
                      </div>
                    </article>
                  </div>
            <?php
                }
                ++$count;
              } // end loop
            }
            ?>
            <!-- nav -->
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <nav class="mt-4">
                    <nav class="mb-md-50">
                    </nav>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- left column -->
        <div class="col-lg-4 rwidget">
          <div class="widget-blocks">
            <div class="row">
              <div class="col-lg-12 col-md-6">
                <div class="widget">
                  <!-- button -->
                  <div class="d-grid gap-2 widget-head ">
                    <a href="http://43.229.77.153/~ztrad/tup_conn34/" class="btn wbtn rounded-0 btn-lg " role="button" type="button">รายงานผลการเรียน
                    </a>
                    <a href="" class="btn wbtn rounded-0 btn-lg wbtn" role="button" type="button">ทำเนียบคณะกรรมการ ม.6
                    </a>
                  </div>
                  <!-- button -->
                  <div>
                    <h1>ข่าวสารสำคัญ</h1>
                  </div>
                  <div class="widget-body">
                    <div class="widget-list">
                      <?php
                      // select data
                      $sql = "SELECT * from news ORDER BY UploadDate DESC LIMIT 5";
                      $result = $mysqli->query($sql);

                      if ($result) {
                        $count = 0;
                        while ($dbarr = $result->fetch_assoc()) {
                          $id = $dbarr['id'];
                          $topic = $dbarr['topic'];
                          $descr = $dbarr['descr'];
                          $UploadDate = $dbarr['UploadDate'];
                          $category = $dbarr['category'];
                          $img = $dbarr['img'];

                          if ($count == 0) { ?>
                            <!-- big news -->
                            <article class="card mb-4">
                              <div class="card-image">
                                <div class="post-info">
                                  <span class="text-uppercase"><?= $UploadDate ?></span>
                                </div>
                                <img loading="lazy" decoding="async" src="<?= $img ?>" alt="Post Thumbnail" class="w-100">
                              </div>
                              <div class="card-body px-0 pb-1">
                                <h3>
                                  <a class="post-title post-title-sm" href="show_detail.php?id=<?php echo $id ?>"><?= $topic ?></a>
                                </h3>
                                <p class="card-text"><?= $descr ?></p>
                              </div>
                            </article>
                          <?php
                          } else { ?>
                            <!-- news -->
                            <a class="media align-items-center" href="article.html">
                              <img loading="lazy" decoding="async" src="<?= $img ?>" alt="Post Thumbnail" class="w-100">
                              <div class="media-body ml-3">
                                <h3 style="margin-top:-5px"><?= $topic ?></h3>
                                <p class="mb-0 small"><?= $descr ?></p>
                              </div>
                            </a>
                      <?php
                          }
                          ++$count;
                        } // end loop
                      }
                      $mysqli->close();
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>