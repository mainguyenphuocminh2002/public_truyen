<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thư Viện Ảnh</title>
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <script src="{{ asset('admin/js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var funcNum = {{ $_GET['CKEditorFuncNum'] . ';' }}
            $('#fileExploder').on('click', 'img,p', function() {
                var fileUrl = $(this).attr('title');
                window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
                window.close();
            }).hover(function() {
                $(this).css('cursor', 'pointer');
            });
        })
    </script>
    <style>
    </style>
</head>

<body>
    <div id="fileExploder">
        <div class="ml-2 mt-2 row w-100">
            @foreach ($fileNames as $fileName)
                <div style="width:180px;height: 180px;background-color: #aaa;border-radius: 5%;overflow: hidden;" class="mr-2 py-1 px-1">
                    <img class="card-img-top" src="{{ asset('imgProducts/' . $fileName) }}"
                        title="{{ asset('imgProducts/' . $fileName) }}" alt="Card image" style="width:100%">
                    <div class="p-0" style="font-size: 14px" class="card-body">
                        <p class="text-center" title="{{ asset('imgProducts/' . $fileName) }}">{{ $fileName }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
