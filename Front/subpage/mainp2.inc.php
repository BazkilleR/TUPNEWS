<main>
  <section class="section">
    <div class="container">
      <div class="main-news">
        <h1 class="line">ข่าวล่าสุด</h1>
      </div>
      <div class="row no-gutters-lg mt-4">
        <div class="col-xl-8 mb-5 mb-lg-0" >
          <div class="row">
            <?php
            // connect db
            require 'server.php';
            mysqli_query($conn, 'Use tup_news;');

            // select data
            $query = "SELECT * from news ORDER BY UploadDate DESC LIMIT 5";
            $result = mysqli_query($conn, $query);

            $count = 0;
            while ($dbarr = mysqli_fetch_array($result)) {
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
                        <img loading="lazy" id="cimg" decoding="async" src="<?=$img?>" alt="Post Thumbnail" class="w-100">
                        <div class="post-info">
                          <span class="text-uppercase"><?=$UploadDate?></span>
                        </div>
                      </div>
                    </a>
                    <div class="card-body px-0 pb-1">
                      <ul class="post-meta mb-2">
                        <li>
                          <a href="#!"><?=$category?></a>
                        </li>
                      </ul>
                      <a href="show_detail.php?id=<?php echo $id?>"><h2 class="h1" id="carda"><?=$topic?></h2></a>
                      <p class="card-text" id="desr"><?=$descr?></p>
                      <div class="content">
                        <a class="read-more-btn" href="show_detail.php?id=<?php echo $id?>">Read Full Article</a>
                      </div>
                    </div>
                  </article>
                </div>
              <?php
              } else { ?>
                <!-- news -->
                <div class="col-md-6 mb-4">
                  <article class="card article-card article-card-sm h-100 ">
                    <a href="article.html">
                      <div class="card-image">
                        <div class="post-info">
                          <span class="text-uppercase"><?=$UploadDate?></span>
                        </div>
                        <img loading="lazy" decoding="async" src="<?=$img?>" alt="Post Thumbnail" class="w-100">
                      </div>
                    </a>
                    <div class="card-body px-0 pb-0">
                      <ul class="post-meta mb-2">
                        <li>
                          <a href="#!"><?=$category?></a>
                        </li>
                      </ul>
                      <h2>
                        <a class="post-title" href="article.html"><?=$topic?></a>
                      </h2>
                      <p class="card-text"><?=$descr?></p>
                      <div class="content">
                        <a class="read-more-btn" href="show_detail.php?id=<?php echo $id?>">Read Full Article</a>
                      </div>
                    </div>
                  </article>
                </div>
            <?php
              }
              ++$count;
            } // end loop
            ?>
            <!-- PAGE NAV -->
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <nav class="mt-4">
                    <nav class="mb-md-50">
                      <ul class="pagination justify-content-center">
                        <li class="page-item">
                          <a class="page-link" href="#!" aria-label="Pagination Arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                            </svg>
                          </a>
                        </li>
                        <li class="page-item active ">
                          <a href="index.html" class="page-link">
                            1
                          </a>
                        </li>
                        <li class="page-item">
                          <a href="#!" class="page-link">
                            2
                          </a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#!" aria-label="Pagination Arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
                          </a>
                        </li>
                      </ul>
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
                  <div class="mt-3">
                    <h1 class="line2">ข่าวสารสำคัญ</h1>
                  </div>
                  <div class="widget-body">
                    <div class="widget-list">
                      <?php
                      // select data
                      $query = "SELECT * from news WHERE level='1' ORDER BY UploadDate DESC LIMIT 5";
                      $result = mysqli_query($conn, $query);

                      $count = 0;
                      while ($dbarr = mysqli_fetch_array($result)) {
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
                                <span class="text-uppercase"><?=$UploadDate?></span>
                              </div>
                              <img loading="lazy" decoding="async" src="<?=$img?>" alt="Post Thumbnail" class="w-100">
                            </div>
                            <div class="card-body px-0 pb-1">
                              <h3>
                                <a class="post-title post-title-sm" href="article.html"><?=$topic?></a>
                              </h3>
                              <p class="card-text" id="desr"><?=$descr?></p>
                              <div class="content">
                                <a class="read-more-btn" href="article.html">Read Full Article</a>
                              </div>
                            </div>
                          </article>
                        <?php
                        } else { ?>
                          <!-- news -->
                          <a class="media align-items-center" href="article.html">
                            <img loading="lazy" decoding="async" src="<?=$img?>" alt="Post Thumbnail" class="w-100">
                            <div class="media-body ml-3">
                              <h3 style="margin-top:-5px"><?=$topic?></h3>
                              <p class="mb-0 small"><?=$descr?></p>
                            </div>
                          </a>
                      <?php
                        }
                        ++$count;
                      } // end loop
                      mysqli_close($conn);
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