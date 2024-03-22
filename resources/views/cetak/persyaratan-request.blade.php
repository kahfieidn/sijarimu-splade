<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>Daftar Persyaratan</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            color: #000000;
        }

        .doc-content {
            max-width: 100%;
            background-color: #ffffff;
            text-align: center;
            /* Center the title text */

        }

        .title {
            font-size: 15pt;
            font-weight: bold;
            color: #000000;
            padding-top: 0;
            line-height: 1.15;
            text-align: center;
            /* Center the title text */
        }

        .subtitle {
            font-size: 13pt;
            color: #666666;
            padding-top: 5pt;
            padding-bottom: 5pt;
            line-height: 1.15;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1pt solid #000000;
            padding: 2pt;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        td {
            vertical-align: top;
        }
    </style>
</head>

<body>


    <div class="doc-content">
    <p><span class="title">Daftar Persyaratan {{$perizinan->nama_perizinan}}</span></p>
<p><span class="subtitle">{{$sektor->nama_sektor}}</span></p>

        <table>
            <thead>
                <tr>
                    <th style="text-align:center;">No.</th>
                    <th>Nama Persyaratan</th>
                </tr>
            </thead>
            <tbody>
                <?php $numbers = 1; ?>
                @foreach($persyaratan as $persyaratan)
                <tr>
                    <td style="text-align:center;">{{ $numbers }}.</td>
                    <td>{!! $persyaratan->nama_persyaratan !!}</td>
                </tr>
                <?php $numbers++; ?>
                @endforeach
            </tbody>
        </table>
    </div>

    <p><span class="title">Catatan:</span></p>
    <ol>{!! $perizinan->note !!}</ol>

</body>

</html>