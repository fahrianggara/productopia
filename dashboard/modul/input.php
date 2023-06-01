<div class="container mt-5">
<form action="" method="POST" class="was-validated">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="Image">Image</label>
                <input type="text" class="form-control" id="Image" placeholder="Use Link for Image" required name="img">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="" required name="nm" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Badge">Badge</label>
                <select class="form-control" id="Badge" required name="bg">
                    <option value="HOT">HOT</option>
                    <option value="NEW">NEW</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Categories">Categories</label>
                <select class="form-control" id="Categories" required name="cate">
                    <option>FASHION</option>
                    <option>ELEKTRONIK</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Original">Price Original</label>
                <input type="number" class="form-control" id="Original" placeholder="" required name="ori" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                <label for="Discount">Price Discount</label>
                <input type="number" class="form-control" id="Discount" placeholder="Optional" name="dis">
                
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" rows="4" id="Description" required name="desc" placeholder="use <p></p>"></textarea>
                <code><small>
                <p> < p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore id iusto quis? Culpa distinctio natus, aperiam quia, tenetur eaque laboriosam architecto dolores itaque quam suscipit sit eos totam, a labore. < /p > </p>
                <p> < p >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error reprehenderit dolore sequi consequatur. Sapiente, animi reprehenderit ex modi velit suscipit? < /p ></p>
                </small></code>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Size">Size</label>
                <input type="text" class="form-control" id="Size" placeholder="" required name="size" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input type="number" class="form-control" id="Quantity" placeholder="" required name="qty">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Stock">Stock</label>
                <input type="number" class="form-control" id="Stock" placeholder="" required name="stk" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
    </div>
  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
</form>

<?php
$file = 'modul/data.json';
// Mendapatkan file json
$anggota = file_get_contents($file);
// Mendecode anggota.json
$data = json_decode($anggota, true); 
 if(isset($_POST['btn'])){
    $image = $_POST['img'];
    $name = $_POST['nm'];
    $badge = $_POST['bg'];
    $category = $_POST['cate'];
    $original = $_POST['ori'];
    $discount = $_POST['dis'];
    $description = $_POST['desc'];
    $size = $_POST['size'];
    $quantity = $_POST['qty'];
    $stock = $_POST['stk'];

    // Menambahkan data baru ke dalam array
    if (empty($data)) {
        $newId = 1;
    } else {
        $newId = end($data)['id'] + 1;
    }

    $newData = array(
        'id' => $newId,
        'image' => $image,
        'name' => $name,
        'badge' => $badge,
        'category' => $category,
        'original' => $original,
        'discount' => $discount,
        'description' => $description,
        'size' => $size,
        'quantity' => $quantity,
        'stock' => $stock
    );
    $data[] = $newData;
}
// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
// Menyimpan data ke dalam anggota.json
$anggota = file_put_contents($file, $jsonfile);
?>
</div>

<div class="container mt-5">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Id</th>
          <th>Image</th>
          <th>Name</th>
          <th>Bagde</th>
          <th>Categorie</th>
          <th>Price Original</th>
          <th>Price Discount</th>
          <th>Size</th>
          <th>Quantity</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no = 1;
         if (!empty($data)) {
            foreach ($data as $row) {
        ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$row['id']?></td>
            <td>
                <img src="<?=$row['image']?>" alt="" srcset="" class="img-fluid">
            </td>
            <td><?=$row['name']?></td>
            <td><?=$row['badge']?></td>
            <td><?=$row['category']?></td>
            <td>IDR.<?=number_format($row['original'],0,".",".")?></td>
            <td>IDR.<?=number_format($row['discount'],0,".",".")?></td>
            <td><?=$row['size']?></td>
            <td><?=$row['quantity']?></td>
            <td><?=$row['stock']?></td>
          <td>
                <a href="modul/edit.php?id=<?=$row['id']?>">Edit</a>
                <a onclick="return confirmDelete()" href="modul/delete.php?id=<?=$row['id']?>">Hapus</a>;
          </td>
        </tr>
          <?php
            }
        }
        ?>
        
      </tbody>
    </table>
  </div>
</div>