<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<body>

<?php include("includes/navbar.php"); ?>
   <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Hello, world!</h1>
      </div>

      <div class="col-md-4">

          <div class="card card-body">
            <form action="save_task.php" method="POST" class="row">
              <div class="col-md-12 form-group">
                <input type="text" name="title" class="form-control" placeholder="Title task" autofocus>
                <br>
              </div>
              <div class="col-md-12 form-group">
                <textarea name="description" class="form-control" placeholder="Description task"></textarea>
                <br>
              </div>
              <div class="form-group">
                <button class="btn btn-success btn-block" name="save_task">Save Task</button>
              </div>
            </form>
          </div>
      
      </div>

      <div class="col-md-8">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, ullam! Quo consequuntur corporis laborum magni perspiciatis libero reiciendis id debitis, delectus recusandae, magnam, inventore ut ipsum ad ab ea nihil.
      </div>


    </div>
   </div>


    <?php include("includes/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>