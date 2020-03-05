<div class="row">

  <div class="col-md-12">

    <h2 class="mb-4">Registered Clients</h2>

    <?php if($clients): ?>

      <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($clients as $index => $client): ?>
          <tr>
            <td class="align-middle"><?= $index+1 ?></td>
            <td class="align-middle"><?= "$client->salutation $client->first_name $client->last_name" ?></td>
            <td class="align-middle"><?= $client->email ?></td>
            <td class="align-middle"><?= $client->country ?></td>
            <td class="align-middle text-center"><a class="btn btn-outline-danger btn-sm" href="actions.php?action=delete&email=<?= $client->email ?>" role="button">Delete</a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    <?php else: ?>
      <div class="alert alert-secondary" role="alert">
        Ooops, we have no clients yet... please try adding the first one.
      </div>    
    <?php endif; ?>

  </div><!-- /.col-md-12 -->

</div><!-- /.row -->