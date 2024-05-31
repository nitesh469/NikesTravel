<?php require "../layout/header.php"; ?>

<div class="container mt-4">
  <div class="row">

    <div class="table-responsive">
      <table class="table table-bordered text-center">
        <thead>
          <tr class="table-dark">
            <td colspan="9">
              <h4 class="text-center pt-2"> SHOW Booking</h4>
            </td>
          </tr>
          <tr class="table-light">
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">phone_number</th>
            <th scope="col">num_of_geusts</th>
            <th scope="col">checkin_date</th>
            <th scope="col">destination</th>
            <th scope="col">status</th>
            <th scope="col">payment</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>
            <th scope="row">1</th>
            <td>MOhamed</td>
            <td>33333</td>
            <td>4</td>
            <td>23-3-19</td>
            <td>Berlin</td>
            <td>Pending</td>
            <td>$104</td>
            <td><a href="delete-posts.html" class="btn btn-danger  text-center "> Cancel Trip</a></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>MOhamed</td>
            <td>33333</td>
            <td>4</td>
            <td>23-3-19</td>
            <td>Berlin</td>
            <td>Pending</td>
            <td>$104</td>
            <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>MOhamed</td>
            <td>33333</td>
            <td>4</td>
            <td>23-3-19</td>
            <td>Berlin</td>
            <td>Pending</td>
            <td>$104</td>
            <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
          </tr>
        </tbody>

      </table>
    </div>



  </div>
</div>


<?php require "../layout/footer.php"; ?>