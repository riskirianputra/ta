<style>
/*Profile Card 3*/
.profile-card-3 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  width: 100%;
  text-align: center;
  height:368px;
  border:none;
}
.profile-card-3 .background-block {
    float: left;
    width: 100%;
    height: 200px;
    overflow: hidden;
}
.profile-card-3 .background-block .background {
  width:36%;
  vertical-align: top;
  opacity: 0.9;
  -webkit-filter: blur(0.5px);
  filter: blur(0.5px);
   -webkit-transform: scale(1.8);
  transform: scale(2.8);
}
.profile-card-3 .card-content {
  width: 100%;
  padding: 15px 25px;
  color:#232323;
  float:left;
  background:#efefef;
  height:50%;
  border-radius:0 0 5px 5px;
  position: relative;
  z-index: 9999;
}
.profile-card-3 .card-content::before {
    content: '';
    background: #efefef;
    width: 120%;
    height: 100%;
    left: 11px;
    bottom: 51px;
    position: absolute;
    z-index: -1;
    transform: rotate(-13deg);
}
.profile-card-3 .profile {
  border-radius: 50%;
  position: absolute;
  bottom: 50%;
  left: 50%;
  max-width: 100px;
  opacity: 1;
  box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
  border: 2px solid rgba(255, 255, 255, 1);
  -webkit-transform: translate(-50%, 0%);
  transform: translate(-50%, 0%);
  z-index:99999;
}
.profile-card-3 h2 {
  margin: 0 0 5px;
  font-weight: 600;
  font-size:25px;
}
.profile-card-3 h2 small {
  display: block;
  font-size: 15px;
  margin-top:10px;
}
.profile-card-3 i {
  display: inline-block;
    font-size: 16px;
    color: #232323;
    text-align: center;
    border: 1px solid #232323;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin:0 5px;
}
.profile-card-3 .icon-block{
    float:left;
    width:100%;
    margin-top:15px;
}
.profile-card-3 .icon-block a{
    text-decoration:none;
}
.profile-card-3 i:hover {
  background-color:#232323;
  color:#fff;
  text-decoration:none;
}
</style>

<!--Profile Card 3-->
<div class="col-md-8">
    <div class="card profile-card-3">
        <div class="background-block">
            <img src="<?=base_url();?>assets/upload/image/sttp.jpg" alt="profile-sample1" class="background"/>
        </div>
        <div class="profile-thumb-block">
            <img src="<?=base_url();?>assets/upload/image/user.png" alt="profile-image" class="profile"/ width="100">
        </div>
        <div class="card-content">
            <h2>Prodi Teknik Komputer<small>Admin</small></h3>
            </div>
        </div>
        <!-- <p class="mt-3 w-100 float-left text-center"><strong>Modren Profile Card</strong></p> -->
</div>