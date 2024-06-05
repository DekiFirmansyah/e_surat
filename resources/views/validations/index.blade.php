@extends('layouts.app', [
'namePage' => 'Validations Management',
'class' => 'sidebar-mini',
'activePage' => 'validations',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('letters.create') }}">Add
                        Letter</a> -->
                    <h4 class="card-title">Validasi Surat</h4>
                    <div class="col-12 mt-2">
                    </div>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        @include('alerts.success')
                        <ul class="nav nav-tabs" id="validationTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="your-validations-tab" data-toggle="tab"
                                    href="#your-validations" role="tab" aria-controls="your-validations"
                                    aria-selected="true">Surat yang Perlu Divalidasi</a>
                            </li>
                            @hasanyrole('secretary')
                            <li class="nav-item">
                                <a class="nav-link" id="apply-letter-code-tab" data-toggle="tab"
                                    href="#apply-letter-code" role="tab" aria-controls="apply-letter-code"
                                    aria-selected="false">Surat yang Perlu Kode Surat</a>
                            </li>
                            @endhasanyrole
                        </ul>
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="tab-content" id="validationTabsContent">
                        <!-- Tab for Your validations -->
                        <div class="tab-pane fade show active" id="your-validations" role="tabpanel"
                            aria-labelledby="your-validations-tab">
                            <h5 class="mt-3">Surat yang Harus Divalidasi</h5>
                            @if($lettersToValidate->isEmpty())
                            <div class="alert alert-info">
                                Tidak ada surat yang perlu divalidasi.
                            </div>
                            @else
                            <div class="row">
                                @foreach($lettersToValidate as $letter)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $letter->title }}</h5>
                                            <p class="card-text">{{ Str::limit($letter->about, 100) }}</p>
                                            <p class="card-text"><small class="text-muted">Tujuan:
                                                    {{ $letter->purpose }}</small>
                                            </p>

                                            <form action="{{ route('validations.validate', $letter->id) }}"
                                                method="POST" class="mt-2">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="notes">Catatan (Optional)</label>
                                                    <textarea name="notes" id="notes" class="form-control" rows="3"
                                                        placeholder="Here can be letter notes"></textarea>
                                                </div>
                                                <label for="File SUrat">{{__(" File Surat (Optional)")}}</label>
                                                <div class="input-group">
                                                    <input type="file" name="file" class="form-control" id="file">
                                                    <label class="input-group-text" for="file">Upload</label>
                                                    @include('alerts.feedback', ['field' => 'file'])
                                                </div>
                                                <button type="submit" class="btn btn-primary">Validasi</button>
                                                <a href="{{ asset('storage/' . $letter->document->file) }}"
                                                    target="_blank" class="btn btn-info pull-right">Lihat Dokumen</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="apply-letter-code" role="tabpanel"
                            aria-labelledby="apply-letter-code-tab">
                            <h5 class="mt-3">Permintaan Kode Surat</h5>
                            @if($requestLetterCode->isEmpty())
                            <div class="alert alert-info">
                                Semua surat sudah terdapat kode surat.
                            </div>
                            @else
                            <div class="row">
                                @foreach($requestLetterCode as $letter)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $letter->title }}</h5>
                                            <p class="card-text">{{ Str::limit($letter->about, 100) }}</p>
                                            <p class="card-text"><small class="text-muted">Tujuan:
                                                    {{ $letter->purpose }}</small>
                                            </p>

                                            <a href="{{ asset('storage/' . $letter->document->file) }}" target="_blank"
                                                class="btn btn-info pull-right">Lihat Dokumen</a>

                                            <button class="btn btn-warning mt-2"
                                                onclick="showCodeInputForm({{ $letter->id }})">Input Kode Surat</button>

                                            <div id="codeInputForm-{{ $letter->id }}" class="code-input-form"
                                                style="display: none;">
                                                <form action="{{ route('letters.updateCode', $letter->id) }}"
                                                    method="POST" class="mt-2">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="letter_code">Kode Surat</label>
                                                        <input type="text" name="letter_code" id="letter_code"
                                                            class="form-control" placeholder="Masukkan kode surat">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Submit Kode</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- <div class="alert alert-danger">
        <span>
            <b></b> This is a PRO feature!</span>
    </div> -->
    <!-- end row -->
</div>
@endsection