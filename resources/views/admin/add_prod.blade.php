aici este panoul de introducere a produselor

<div class="container">
    <form method="POST" action="{{route('addimage')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
        <label for="formGroupExampleInput">Numele produsului</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Numele produsului">
        </div>

        <div class="form-group">
        <label for="formGroupExampleInput2">Descrierea produsului</label>
        <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Descrierea produsului">
        </div>

        <div class="form-group">
        <label for="formGroupExampleInput2">Pretul produsului</label>
        <input type="text" name="price" class="form-control" id="formGroupExampleInput3" placeholder="Pretul produsului">
        </div>

        <div class="custom-file">
        <input type="file" name="pic" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

         <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
    </form>
</div>
