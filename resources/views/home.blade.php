@extends('layouts.app_offic')

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">
            Latest posts
        </h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li>
                    <a data-action="collapse">
                    </a>
                </li>
                <li>
                    <a data-action="reload">
                    </a>
                </li>
                <li>
                    <a data-action="close">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-info btn-float" type="button">
                    <i class="icon-search4">
                    </i>
                    <span>
                        Search
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
