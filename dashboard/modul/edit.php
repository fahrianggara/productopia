<?php
// Membaca data array dari file JSON (opsional)
$data = json_decode(file_get_contents('data.json'), true);
if (!$data) {
    $data = array();
}
// Mendapatkan ID dari URL
$id = $_GET['id'];
// Mencari data dengan ID yang sesuai
foreach ($data as $index) {
    if ($index['id'] == $id) {
        $editData = $index;
        break;
    }
    // }else{
    //     echo "<script> alert('Data tidak ditemukan'); </script>";
    //     echo "<script>document.location.href='index.php';</script>";
    // }
}

// Jika data ditemukan
if ($index) {
    // Tampilkan form edit
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus item ini?");
        }
    </script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="?page=product">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>
</body>
</html>
    <h2>Edit Data</h2>
<div class="container mt-5">
<form action="process-edit.php?id=<?=$editData['id']?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="Image">Image</label>
                <input type="text" class="form-control" id="Image" placeholder="Use Link for Image" value="<?=$editData['image']?>" name="img">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="" value="<?=$editData['name']?>" name="nm" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Badge">Badge Latest = <?=$editData['badge']?></label>
                <select class="form-control" id="Badge" name="bg">
                    <option value="HOT">HOT</option>
                    <option value="NEW">NEW</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Categories">Categories Latest = <?=$editData['category']?></label>
                <select class="form-control" id="Categories" name="cate">
                    <option>FASHION</option>
                    <option>ELEKTRONIK</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Original">Price Original</label>
                <input type="number" class="form-control" id="Original" placeholder="" value="<?=$editData['original']?>" name="ori" >
                <label for="Discount">Price Discount</label>
                <input type="text" class="form-control" id="Discount" placeholder="" value="<?=$editData['discount']?>" name="dis">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" rows="4" id="Description" name="desc" placeholder="use <p></p>"><?=$editData['description']?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Size">Size</label>
                <input type="text" class="form-control" id="Size" placeholder="" value="<?=$editData['size']?>" name="size" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input type="text" class="form-control" id="Quantity" placeholder="" value="<?=$editData['quantity']?>" name="qty">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Stock">Stock</label>
                <input type="text" class="form-control" id="Stock" placeholder="" value="<?=$editData['stock']?>" name="stk" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
    </div>
  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
</form>
<?php    
}
?>
