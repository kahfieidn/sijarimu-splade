<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="id" lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Permintaan Rekomendasi {{$pemohon->user->name}}</title>
    <meta name="author" content="web turing" />
    <style type="text/css">
        * {
            padding: 0;
            text-indent: 0;
        }

        p {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10.5pt;
            margin: 0pt;
        }

        .s1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10.5pt;
        }

        .s2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10.5pt;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }
    </style>
</head>

<body>
    <p style="padding-left: 6pt;text-indent: 0pt;text-align: left;"><span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <img alt="" src="images/headercop.png" style="
                      width: 735.33px;
                      height: 130.67px;
                      margin-left: 0px;
                      margin-top: 0px;
                      transform: rotate(0rad) translateZ(0px);
                      -webkit-transform: rotate(0rad) translateZ(0px);
                    " title="" />
                </tr>
            </table>
        </span></p>
    <p style="padding-top: 2pt;text-indent: 0pt;text-align: right;">Tanjungpinang, {{$pemohon->created_at->isoFormat('D MMMM Y')}}</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <table style="border-collapse:collapse;margin-left:5.46pt" cellspacing="0">
        <tr style="height:73pt">
            <td style="width:53pt">
                <p class="s1" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">Nomor Lampiran Sifat Perihal</p>
            </td>
            <td style="width:14pt">
                <p class="s1" style="text-indent: 0pt;line-height: 12pt;text-align: center;">:</p>
                <p class="s1" style="text-indent: 0pt;line-height: 12pt;text-align: center;">:</p>
                <p class="s1" style="text-indent: 0pt;text-align: center;">:</p>
                <p class="s1" style="text-indent: 0pt;text-align: center;">:</p>
            </td>
            <td style="width:232pt">
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">{{$pemohon->no_permintaan_rekomendasi}}</p>
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">-</p>
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">Penting</p>
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">Mohon Rekomendasi Teknis Perpanjangan Rencana Pengoperasian Kapal (RPK)</p>
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;line-height: 11pt;text-align: left;">{{$type_rpk->nama_kapal}}</p>
            </td>
            <td style="width:38pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <p class="s1" style="padding-left: 16pt;text-indent: 0pt;text-align: left;">Yth</p>
                <p class="s1" style="padding-right: 5pt;text-indent: 0pt;text-align: right;">.</p>
            </td>
            <td style="width:146pt">
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">Kepada :</p>
                <p class="s2" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">Kepala Dinas Perhubungan Provinsi Kepulauan Riau</p>
                <p class="s2" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">di -</p>
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <p class="s2" style="padding-left: 51pt;text-indent: 0pt;line-height: 11pt;text-align: left;">TANJUNGPINANG</p>
            </td>
        </tr>
    </table>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="padding-left: 73pt;text-indent: 0pt;text-align: left;">Dengan hormat,</p>
    <p style="padding-top: 7pt;padding-left: 73pt;text-indent: 37pt;line-height: 114%;text-align: justify;">Menindaklanjuti Surat Direktur {{$profile->perusahaan}} Nomor {{$pemohon->no_surat_permohonan}} @if($pemohon->no_surat_permohonan == null) [NO_SURAT] @endif tanggal {{ $pemohon->created_at->isoFormat('D MMMM Y') }} perihal Permohonan Perpanjangan Persetujuan Pengoperasian Kapal pada Trayek Tetap dan Tidak Teratur Angkutan Laut Dalam Negeri Bersama ini kami sampaikan hal-hal berikut :</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <table style="border-collapse:collapse;margin-left:89.36pt" cellspacing="0">
        <tr style="height:45pt">
            <td style="width:18pt">
                <p class="s1" style="padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">1.</p>
            </td>
            <td style="width:430pt" colspan="4">
                <p class="s1" style="padding-left: 6pt;padding-right: 2pt;text-indent: 0pt;line-height: 114%;text-align: justify;">Persetujuan Pengoperasian Kapal Pelra Perusahaan yang bersangkutan akan habis masa berlakunya dan bermaksud untuk melakukan perpanjangan persetujuan, dengan data permohonan sebagai berikut :</p>
            </td>
        </tr>
        <tr style="height:19pt">
            <td style="width:18pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:21pt">
                <p class="s1" style="padding-top: 4pt;padding-left: 5pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">a.</p>
            </td>
            <td style="width:119pt">
                <p class="s1" style="padding-top: 4pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">Nama Perusahaan</p>
            </td>
            <td style="width:30pt">
                <p class="s1" style="padding-top: 4pt;padding-right: 5pt;text-indent: 0pt;text-align: right;">:</p>
            </td>
            <td style="width:260pt">
                <p class="s1" style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: justify;">{{$profile->perusahaan}}</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:18pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:21pt">
                <p class="s1" style="padding-left: 5pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">b.</p>
            </td>
            <td style="width:119pt">
                <p class="s1" style="padding-left: 6pt;text-indent: 0pt;text-align: left;">Nama Kapal</p>
            </td>
            <td style="width:30pt">
                <p class="s1" style="padding-right: 5pt;text-indent: 0pt;text-align: right;">:</p>
            </td>
            <td style="width:260pt">
                <p class="s1" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$type_rpk->nama_kapal}}</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:18pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:21pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">c.</p>
            </td>
            <td style="width:119pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">Type Kapal</p>
            </td>
            <td style="width:30pt">
                <p class="s1" style="padding-top: 1pt;padding-right: 5pt;text-indent: 0pt;text-align: right;">:</p>
            </td>
            <td style="width:260pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$type_rpk->jenis_kapal}}</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:18pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:21pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 5pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">d.</p>
            </td>
            <td style="width:119pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">Pelabuhan Pangkal</p>
            </td>
            <td style="width:30pt">
                <p class="s1" style="padding-top: 1pt;padding-right: 5pt;text-indent: 0pt;text-align: right;">:</p>
            </td>
            <td style="width:260pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$type_rpk->pelabuhan_pangkal}}</p>
            </td>
        </tr>
        <tr style="height:18pt">
            <td style="width:18pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:21pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 5pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">e.</p>
            </td>
            <td style="width:119pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">Pelabuhan Singgah</p>
            </td>
            <td style="width:30pt">
                <p class="s1" style="padding-top: 1pt;padding-right: 5pt;text-indent: 0pt;text-align: right;">:</p>
            </td>
            <td style="width:260pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$type_rpk->pelabuhan_singgah}}</p>
            </td>
        </tr>
        <tr style="height:58pt">
            <td style="width:18pt">
                <p class="s1" style="padding-top: 3pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">2.</p>
            </td>
            <td style="width:430pt" colspan="4">
                <p class="s1" style="padding-top: 3pt;padding-left: 6pt;padding-right: 2pt;text-indent: 0pt;line-height: 114%;text-align: justify;">Mengingat rencana kegiatan termasuk dalam sektor Perhubungan, kiranya dapat ditindaklanjuti dengan Rekomendasi Teknis guna mengetahui layak atau tidak diterbitkan sebagaimana yang dimohonkan, termasuk kewajiban-kewajiban yang harus dilaksanakan</p>
                <p class="s1" style="padding-left: 6pt;text-indent: 0pt;line-height: 11pt;text-align: justify;">oleh pemohon sesuai dengan peraturan yang berlaku.</p>
            </td>
        </tr>
    </table>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="padding-top: 9pt;text-indent: 0pt;text-align: right;">Demikian disampaikan untuk dimaklumi, atas perhatian dan kerjasamanya diucapkan terima kasih.</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <table style="border-collapse:collapse;margin-left:263.51pt" cellspacing="0">
        <tr style="height:104pt">
            <td style="width:244pt">
                <p class="s2" style="padding-left: 29pt;text-indent: -26pt;line-height: 114%;text-align: left;">a.n. KEPALA DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</p>
                <p class="s2" style="padding-left: 48pt;text-indent: 0pt;text-align: left;">PROVINSI KEPULAUAN RIAU</p>
                <p class="s1" style="padding-top: 1pt;padding-left: 2pt;margin-bottom:10pt;text-indent: 0pt;text-align: left;">Koordinator Penyelenggaraan Pelayanan Perizinan</p>
            </td>
        </tr>
        @if(in_array($pemohon->status_permohonan_id, [5,6,7,8,9]))
        <tr>
            <img alt="" src="images/ttekadis.jpg" style="
                  text-align: left;
                  width: 236.79px;
                  height: 84.78px;
                  margin-left: 60px;
                  margin-top: 0px;
                  transform: rotate(0rad) translateZ(0px);
                  -webkit-transform: rotate(0rad) translateZ(0px);
                " title="" />
        </tr>
        @endif
        <tr style="height:90pt">
            <td style="width:244pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <p class="s2" style="padding-top: 4pt;padding-left: 69pt;text-indent: 0pt;text-align: left;">ALFIAN, S.Sos., M.Si</p>
                <p class="s1" style="padding-top: 1pt;padding-left: 69pt;text-indent: 0pt;text-align: left;">Pembina Tk. I (IV/b)</p>
                <p class="s1" style="padding-top: 1pt;padding-left: 69pt;text-indent: 0pt;line-height: 11pt;text-align: left;">NIP. 19700713 199201 1 001</p>
            </td>
        </tr>
    </table>
    <p style="text-indent: 0pt;text-align: left;margin-top:40pt;"><br /></p>
    <p style="padding-left: 30pt;text-indent: 0pt;text-align: left;">TEMBUSAN, disampaikan kepada Yth.:</p>
    <p style="padding-top: 1pt;padding-left: 30pt;text-indent: 0pt;line-height: 114%;text-align: left;">Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu </p>
    <p style="padding-top: 1pt;padding-left: 30pt;text-indent: 0pt;line-height: 114%;text-align: left;">Provinsi Kepulauan Riau di Tanjungpinang (sebagai laporan). </p>
</body>

</html>