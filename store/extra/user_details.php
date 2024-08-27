<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if($_GET['action']){
$action = $_GET['action'];
$id = $_GET['post'];
$get_data = "SELECT * FROM pages WHERE id='$id'";
$response = $db->query($get_data);
$data = $response->fetch_assoc();
$post_title = $data['post_title'];
$post_content = $data['post_content'];
$seo_title = $data['seo_title'];
$meta_keywords = $data['meta_keywords'];
$meta_description = $data['meta_description'];
$canonical_tag = $data['canonical_tag'];
$post_status = $data['post_status'];
$sort_order = $data['sort_order'];
$post_image = $data['post_image'];


}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card mt-2 px-1" style="border-top:3px solid tomato;">
              <!-- /.card-header -->
              <div class="row py-2 px-1 border-bottom">
                <div class="col-11 px-2 d-flex">
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 50px; height: 50px; text-align: center;"> <i class="fa fa-users" style="font-size: 30px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center">Users Details</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="user_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
              <div class="row p-1">
                <div class="col-lg-4">
                  <div class="card mb-4 shadow-lg">
                    <div class="card-body text-center"> <img src="upload/profile_images/5.jpg" alt="avatar" class="rounded-circle img-fluid border" style="width: 150px;">
                      <h5 class="my-3">John Smith</h5>
                      <p class="text-muted mb-1">Full Stack Developer</p>
                      <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                      <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary mr-2">Follow</button>
                        <button type="button" class="btn btn-outline-primary mr-1">Message</button>
                      </div>
                    </div>
                  </div>
                  <div class="card mb-4 mb-lg-0 shadow-lg">
                    <div class="card-body p-0">
                      <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3"> <i class="fas fa-globe fa-lg text-warning"></i>
                          <p class="mb-0">https://amsolution.in.net</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3"> <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                          <p class="mb-0">amscode-github</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3"> <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                          <p class="mb-0">amscode-twitter</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3"> <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                          <p class="mb-0">amscode-instagram</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3"> <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                          <p class="mb-0">amscode-facebook</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4 shadow-lg">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">Er. Aman</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">amsolutionweb@gmail.com</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">(097) 234-5678</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">(098) 765-4321</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card mb-4 mb-md-0 shadow-lg">
                        <div class="card-body">
                          <p class="mb-4"><span class="text-primary font-italic me-1">Skill</span> Development </p>
                          <p class="mb-1" style="font-size: .77rem;">HTML</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">CSS</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 75%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">JavaScript</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">Bootstrap</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 70%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">React JS</p>
                          <div class="progress rounded mb-2" style="height: 5px;">
                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 90%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card mb-4 mb-md-0 shadow-lg">
                        <div class="card-body">
                          <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status </p>
                          <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">eCommerce Development</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile App Development</p>
                          <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                          <div class="progress rounded mb-2" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.container-fluid -->
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
require_once("common/footer.php");
require_once("common/script.php");

?>
</body>
</html>