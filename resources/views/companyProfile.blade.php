@extends('layouts.companyprofile.master',['title' => 'Company Profile'])
@section('styles')
<style> 
 @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css?family=Bree+Serif&display=swap");

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  background: #e9e9e9;
  /* overflow-x: hidden; */
  /* padding-top: 90px; */
  font-family: "Poppins", sans-serif;
  /* margin: 0 100px; */
}
p {
  margin: 0 0 10px;
  color: rgba(0, 0, 0, 0.5);
}
.user-bio {
  margin-top: 40px;
  font-family: "Poppin";
}

.bio {
  margin-top: 8px;
}

.profile-header {
  background: #fff;
  width: 100%;
  display: flex;
  height: 190px;
  position: relative;
  border-bottom: 2px solid lightslategrey;
}

.profile-img {
  float: left;
  width: 298px;
  height: 200px;
}

.profile-img img {
  border-radius: 50%;
  display: inline-block;
  height: 150px;
  width: 150px;
  border: 5px solid #fff;
  box-shadow: 0px 0px 9px -1px rgb(0 0 0 / 10%);
  position: relative;
  left: 87px;
  top: 20px;
  z-index: 5;
  background: #fff;
}

.profile-nav-info {
  float: left;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.profile-nav-info h3 {
  font-variant: small-caps;
  font-size: 2rem;
  font-family: sans-serif;
  font-weight: bold;
  text-transform: uppercase;
  color: #35c64a !important;
}

.profile-nav-info .address {
  display: flex;
  font-weight: bold;
  color: #777;
}

.profile-nav-info .address p {
  margin-right: 5px;
}

.profile-option {
  width: 40px;
  height: 40px;
  position: absolute;
  right: 50px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: all 0.5s ease-in-out;
  outline: none;
  background: #e40046;
}

.profile-option:hover {
  background: #fff;
  border: 1px solid #e40046;
}
.profile-option:hover .notification i {
  color: #e40046;
}

.profile-option:hover span {
  background: #e40046;
}

.profile-option .notification i {
  color: #fff;
  font-size: 1.2rem;
  transition: all 0.5s ease-in-out;
}

.profile-option .notification .alert-message {
  position: absolute;
  top: -5px;
  right: -5px;
  background: #fff;
  color: #e40046;
  border: 1px solid #e40046;
  padding: 5px;
  border-radius: 50%;
  height: 20px;
  width: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 0.8rem;
  font-weight: bold;
}

.main-bd {
  width: 100%;
  display: flex;
}

.profile-side {
  width: 300px;
  background: #fff;
  padding: 44px 30px 20px;
  font-family: "Bree Serif", serif;
  z-index: 99;
  height: 100%;
}

.profile-side p {
  margin-bottom: 7px;
  color: #333;
  font-size: 14px;
  font-family: "Poppins", sans-serif;
}

.profile-side p i {
  color: #e40046;
  margin-right: 10px;
}

.mobile-no i {
  transform: rotateY(180deg);
  color: #e40046;
}

.profile-btn {
  display: flex;
}

button.chatbtn,
button.createbtn {
  border: 0;
  padding: 10px;
  width: 100%;
  border-radius: 3px;
  background: #e40046;
  color: #fff;
  font-family: "Bree Serif";
  font-size: 1rem;
  margin: 5px 2px;
  cursor: pointer;
  outline: none;
  margin-bottom: 10px;
  transition: background 0.3s ease-in-out;
  box-shadow: 0px 5px 7px 0px rgba(0, 0, 0, 0.3);
}

button.chatbtn:hover,
button.createbtn:hover {
  background: rgba(288, 0, 70, 0.9);
}

button.chatbtn i,
button.createbtn i {
  margin-right: 5px;
}

.user-rating {
  display: flex;
}

.user-rating h3 {
  font-size: 2.5rem;
  font-weight: 200;
  margin-right: 5px;
  letter-spacing: 1px;
  color: #666;
}

.user-rating .no-of-user-rate {
  font-size: 0.9rem;
}

.rate {
  padding-top: 6px;
}

.rate i {
  font-size: 0.9rem;
  color: rgba(228, 0, 70, 1);
}

.nav {
  width: 100%;
  z-index: -1;
}

.nav ul {
  display: flex;
  justify-content: space-around;
  list-style-type: none;
  height: 40px;
  background: #fff;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}

.nav ul li {
  padding: 10px;
  width: auto;
  cursor: pointer;
  text-align: center;
  transition: all 0.2s ease-in-out;
}

.nav ul li:hover,
.nav ul li.active {
  box-shadow: 0px -3px 0px rgba(288, 0, 70, 0.9) inset;
}

.profile-body {
  width: 100%;
  z-index: -1;
}

.tab {
  display: none;
}

.tab {
  padding: 20px;
  width: 100%;
  text-align: center;
}

@media (max-width: 1100px) {
  .profile-side {
    width: 250px;
    padding: 90px 15px 20px;
  }

  .profile-img img {
    height: 200px;
    width: 200px;
    left: 50px;
    top: 50px;
  }
}

@media (max-width: 900px) {
  body {
    margin: 0 20px;
  }

  .profile-header {
    display: flex;
    height: 100%;
    flex-direction: column;
    text-align: center;
    padding-bottom: 20px;
  }

  .profile-img {
    float: left;
    width: 100%;
    height: 200px;
  }

  .profile-img img {
    position: relative;
    height: 200px;
    width: 200px;
    left: 0px;
  }

  .profile-nav-info {
    text-align: center;
  }

  .profile-option {
    right: 20px;
    top: 75%;
    transform: translateY(50%);
  }

  .main-bd {
    flex-direction: column;
    padding-right: 0;
  }

  .profile-side {
    width: 100%;
    text-align: center;
    padding: 20px;
    margin: 5px 0;
  }

  .profile-nav-info .address {
    justify-content: center;
  }

  .user-rating {
    justify-content: center;
  }
}

@media (max-width: 400px) {
  body {
    margin: ;
  }

  .profile-header h3 {
  }

  .profile-option {
    width: 30px;
    height: 30px;
    position: absolute;
    right: 15px;
    top: 83%;
  }

  .profile-option .notification .alert-message {
    top: -3px;
    right: -4px;
    padding: 4px;
    height: 15px;
    width: 15px;
    font-size: 0.7rem;
  }

  .profile-nav-info h3 {
    font-size: 1.9rem;
  }

  .profile-nav-info .address p,
  .profile-nav-info .address span {
    font-size: 0.7rem;
  }
}
#see-more-bio,
#see-less-bio {
  color: blue;
  cursor: pointer;
  text-transform: lowercase;
}
.tab h1 {
  font-family: "Bree Serif", sans-serif;
  display: flex;
  justify-content: center;
  margin: 20px auto;
}

/* Tab CSS  */
#exTab1 .tab-content {
  color: white;
  background-color: #428bca;
  padding: 5px 15px;
}

#exTab2 h3 {
  color: white;
  background-color: #428bca;
  padding: 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0;
}

#exTab3 .tab-content {
  color: white;
  background-color: #428bca;
  padding: 5px 15px;
}

.right-side .tab-content {
  padding-left: 0 10px;
}

.attachment {
  margin-bottom: 0 !important;
}
.attachment-container {
  margin-top: 10px;
}

.company-detail {
  margin-top: 10px;
}

.gallery {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 4px;
}

.rating-container {
  margin-left: 30px;
}

.comment-div {
  margin-bottom: 28px;
}

.glyphicon {
  margin-right: 10px !important;
}

.right-side {
  width: 75%;
  background-color: white;
}

.tab-content > .active {
  display: inline !important;
}

.nav-tabs > li.active > a {
  border: 0 !important;
  border-bottom: 5px solid #35c74a !important;
}

@media screen and (max-width: 900px) {
  .right-side {
    width: 100%;
  }
}

</style>
@endsection
@section('content')
<div class="container">
      <div class="profile-header">
        <div class="profile-img">
          <img
            src="https://source.unsplash.com/random/200x200"
            width="200"
            alt="Profile Image"
          />
        </div>
        <div class="profile-nav-info">
          <h3 class="user-name">Company Name</h3>
          <div class="address">
            <p id="state" class="state">Address</p>
            <span id="country" class="country">,Country name</span>
          </div>
        </div>
      </div>

      <div class="main-bd">
        <div class="left-side">
          <div class="profile-side">
            <p class="mobile-no">
              <span
                class="glyphicon glyphicon-earphone"
                style="color: dodgerblue"
              ></span>
              0300-12345678
            </p>
            <p class="user-mail">
              <span
                class="glyphicon glyphicon-envelope"
                style="color: dodgerblue"
              ></span>
              acdef@gmail.com
            </p>
            <div class="user-bio">
              <h3>Company Information</h3>
              <p class="bio" style="color: rgba(0, 0, 0, 0.5)">
                Lorem ipsum dolor sit amet, hello how consectetur adipisicing
                elit. Sint consectetur provident magni yohoho consequuntur,
                voluptatibus ghdfff exercitationem at quis similique. Optio,
                amet!
              </p>
            </div>
            <div class="user-bio">
              <h3>Company Rating</h3>
              <div class="user-rating">
                <h3 class="rating">4.5</h3>
                <div class="rate">
                  <div class="star-outer">
                    <!-- <div class="star-inner"> -->
                    <span class="rating-container">
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                    </span>
                    <!-- </div> -->
                  </div>
                  <span class="no-of-user-rate"
                    ><span>123</span>&nbsp;&nbsp;reviews</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="right-side">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tab1"
                >Company Details</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab2"
                >Designer List</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab3">Reviews</a>
            </li>
          </ul>

          <div class="tab-content">
            <div id="tab1" class="container tab-pane active">
              <br />
              <div class="row">
                <div class="col-lg-8">
                  <strong>Date of Establishment :</strong>
                  <br />
                  <div class="attachment-container">
                    <strong>Attachments:</strong><br />
                    <p class="attachment"><a href="#">Preview CV</a></p>
                    <p class="attachment">
                      <a href="#">Preview indemnity Insurance</a>
                    </p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <strong>Website link:</strong>
                  <a href="#">first.last@example.com</a>
                </div>
              </div>
              <div class="row company-detail">
                <div class="col-lg-12">
                  <strong class="company-detail--title">Company Detail</strong>
                  <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Sit doloremque, obcaecati soluta alias distinctio laudantium
                    itaque similique libero nihil labore aliquam laborum
                    voluptate enim in perferendis molestias suscipit, sint cum.
                    Non quas distinctio, reprehenderit delectus deleniti nostrum
                    illo eum cupiditate repudiandae voluptates natus quo
                    consectetur quam nisi tenetur dolorum placeat ipsum
                    assumenda fugit. Quisquam, ullam aut asperiores, recusandae
                    animi modi architecto quis ea officiis, pariatur aliquam
                    aspernatur totam sint sequi iure dolores. Optio velit iusto
                    rerum, quod odit tenetur magni asperiores aliquid id sequi
                    voluptate ad veritatis animi reiciendis quam, illo modi sed
                    accusamus natus. Nesciunt quod veniam pariatur cum accusamus
                    iure praesentium atque, in fugit laboriosam unde quis natus
                    deserunt, reprehenderit iste culpa voluptatem harum minus
                    eligendi, blanditiis saepe? Aliquam quam tempore, non
                    veritatis dolore quo libero in voluptatem reprehenderit
                    culpa numquam vitae expedita iure voluptate! Aliquam maxime,
                    illo minima odio rerum facilis aperiam omnis nihil quae
                    corporis pariatur, quasi iure amet a maiores sunt.
                    Reprehenderit ipsam beatae, minima quod, ullam quae voluptas
                    maxime impedit magnam enim quasi debitis sequi cum officiis
                    itaque accusantium sint eaque recusandae explicabo
                    blanditiis. Nobis obcaecati a corrupti eos vitae id nemo
                    facilis deserunt incidunt ratione enim dignissimos nam dicta
                    eum, asperiores atque quia!
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="attachment-container">
                    <strong>Other Attachments:</strong><br />
                    <p class="attachment"><a href="#">Attachment-1</a></p>
                    <p class="attachment">
                      <a href="#">Attachment-2</a>
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="gallery">
                    <img
                      src="https://source.unsplash.com/random/200x200"
                      alt=""
                    />
                    <img
                      src="https://source.unsplash.com/random/200x200"
                      alt=""
                    />
                    <img
                      src="https://source.unsplash.com/random/200x200"
                      alt=""
                    />
                    <img
                      src="https://source.unsplash.com/random/200x200"
                      alt=""
                    />
                    <img
                      src="https://source.unsplash.com/random/200x200"
                      alt=""
                    />
                    <img
                      src="https://source.unsplash.com/random/200x200"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <div id="tab2" class="container tab-pane fade">
              <br />
              <table class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="tab3" class="container tab-pane fade">
              <br />
              <div class="comment-div">
                <strong>User Name:</strong>
                <span class="rating-container">
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                </span>
                <p class="comment">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                  modi aut animi in harum aliquid.
                </p>
              </div>
              <div class="comment-div">
                <strong>User Name:</strong>
                <span class="rating-container">
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                </span>
                <p class="comment">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                  modi aut animi in harum aliquid.
                </p>
              </div>
              <div class="comment-div">
                <strong>User Name:</strong>
                <span class="rating-container">
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                </span>
                <p class="comment">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
                  modi aut animi in harum aliquid.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
@section('scripts')
  
@endsection
