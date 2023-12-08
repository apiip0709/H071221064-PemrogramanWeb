<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form action="{{ route('searchJobs') }}" method="GET">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <input type="text" name="keyword" class="form-control border-0" placeholder="Keyword" autocomplete="off"/>
                        </div>
                        <div class="col-md-3">
                            <select name="category" class="form-select border-0">
                                <option value="" selected>Category</option>
                                @foreach ($jobposts as $item)
                                    <option value="{{ $item->posisi }}">{{ $item->posisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="location" class="form-select border-0">
                                <option value="" selected>Location</option>
                                @foreach ($lokasi as $data)
                                    <option value="{{ $data->lokasi }}">{{ $data->lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="perusahaan" class="form-select border-0">
                                <option value="" selected>Perusahaan</option>
                                @foreach ($perusahaan as $data)
                                    <option value="{{ $data->id }}">{{ $data->namaCompany }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
