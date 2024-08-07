<html>
<head>
    <style>
    /* Font Definitions */
    @font-face {
        font-family: "Cambria Math";
        panose-1: 2 4 5 3 5 4 6 3 2 4;
    }

    @font-face {
        font-family: Calibri;
        panose-1: 2 15 5 2 2 2 4 3 2 4;
    }

    @font-face {
        font-family: "Segoe UI";
        panose-1: 2 11 5 2 4 2 4 2 2 3;
    }

    /* Style Definitions */
    p.MsoNormal,
    li.MsoNormal,
    div.MsoNormal {
        margin: 0in;
        font-size: 12.0pt;
        font-family: "Times New Roman", serif;
    }

    .MsoChpDefault {
        font-family: "Calibri", sans-serif;
    }

    @page WordSection1 {
        size: 8.5in 14.0in;
        margin: 1.0in 1.0in 1.0in 1.0in;
    }

    .WordSection1 {
        width: 600px;


    }
</style>

</head>

<body lang="EN-US">
    <div class="WordSection1" style="width: 600px;">
        <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="width:5.3in;margin-left:5.4pt;border-collapse:collapse">
            <tbody>
                <tr style="height:67.5pt">
                    <td width="85" valign="top" style="width:63.8pt;padding:0in 5.4pt 0in 5.4pt; height:67.5pt">
                        <p class="MsoNormal"><span
                                style="position:absolute;margin-left:-7px;margin-top:90px;width:602px;height:7px"><img
                                    width="602" height="7" src="<?=base_url('assets/surat/image001.png')?>">
                            </span>
                            <span style="z-index:-1895825408;margin-left:-7px;margin-top:5px;width:81px;height:74px">
                                <img width="80" height="80" src="<?=base_url('assets/img/logo.png')?>">
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="MsoNormal" align="center" style="text-align:center">
                        <b>
                            <span style="font-size:14.0pt;font-family: Arial ,sans-serif">
                            PEMERINTAH DESA LONG TITI
                            </span>
                        </b></p>
                        <p class="MsoNormal" align="center" style="text-align:center"><b>
                            <span style="font-family: Arial ,sans-serif">
                                KECAMATAN SUNGAI TUBU
                            </span></b></p>
                        <p class="MsoNormal" align="center" style="text-align:center"><i><span
                                    style="font-family: Arial ,sans-serif"></span></i></p>
                    </td>
                </tr>
            </tbody>
        </table>

<p class="MsoNormal"><span style="font-family: Arial ,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>

<p class="MsoNormal" align="center" style="text-align:center"><b><u><span lang="ES"
                style="font-size:14.0pt;font-family: Arial ,sans-serif">SURAT KETERANGAN
                PINDAH</span></u></b></p>
                
<p class="MsoNormal" align="center" style="text-align:center">
    <span lang="SV" style="font-family: Arial ,sans-serif">NOMOR : 145 / <?=isset($dataSurat->no_surat) ?  str_pad($dataSurat->no_surat, 4, "0", STR_PAD_LEFT) : '___'?> / DL / <?=date("Y")?></span>
</p>

<p class="MsoNormal"><span lang="SV" style="font-family: Arial ,sans-serif">&nbsp;</span></p>

<p class="MsoNormal"><span lang="SV" style="font-family: Arial ,sans-serif">&nbsp;</span></p>

<p class="MsoNormal" style="text-align:justify"><span lang="SV" style="font-family:
Arial ,sans-serif">Yang bertanda tangan dibawah ini :</span></p>

<p class="MsoNormal" style="text-align:justify"><span lang="SV" style="font-family:
Arial ,sans-serif">&nbsp;</span></p>

<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0"
    style="margin-left:.9pt;border-collapse:collapse">
    <tbody>
            <tr>
                <td width="258" valign="top" style="width:193.5pt;padding:0in 5.4pt 0in 5.4pt">
                <p class="MsoNormal" style="text-align:justify"><span style="font-family: Arial ,sans-serif">
                Nama</span></p>
                </td>
                <td width="24" valign="top" style="width:.25in;padding:0in 5.4pt 0in 5.4pt">
                    <p class="MsoNormal" style="text-align:justify"><span
                            style="font-family: Arial ,sans-serif">:</span></p>
                </td>
                <td width="258" valign="top" style="width:193.5pt;padding:0in 5.4pt 0in 5.4pt">
                <p class="MsoNormal" style="text-align:justify"><span
                            style="font-family: Arial ,sans-serif"><?= strtoupper($kepala_desa->nama);?></span></p>
                </td>
            </tr>
         <tr>
                <td width="258" valign="top" style="width:193.5pt;padding:0in 5.4pt 0in 5.4pt">
                    <p class="MsoNormal" style="text-align:justify"><span style="font-family: Arial ,sans-serif">
                    Jabatan</span></p>
                </td>
                <td width="24" valign="top" style="width:.25in;padding:0in 5.4pt 0in 5.4pt">
                    <p class="MsoNormal" style="text-align:justify"><span
                            style="font-family: Arial ,sans-serif">:</span></p>
                </td>
                <td width="258" valign="top" style="width:193.5pt;padding:0in 5.4pt 0in 5.4pt">
                 <p class="MsoNormal" style="text-align:justify">
                 <span style="font-family: Arial ,sans-serif"><?=strtoupper($kepala_desa->jabatan);?></span>
                </p>
                </td>

         </tr>
        
    </tbody>
</table>

<p class="MsoNormal" style="text-align:justify"><span style="font-family: Arial ,sans-serif">&nbsp;</span></p>
<span style="font-family: Arial ,sans-serif">Dengan ini menerangkan bahwa: </span></p>  

<p class="MsoNormal" style="text-align:justify"><span style="font-family: Arial ,sans-serif">&nbsp;</span></p>

<?php if (isset($penduduk->nik)) : ?>
    <p id="nik" hidden><?= $penduduk->nik ?></p>
<?php endif; ?>

<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="margin-left:.9pt;border-collapse:collapse">
    <tbody width="100%">
        <tr>
            <td width="258" valign="top" style="width:193.5pt;padding">
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">Nama
                    </span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><b><span style="font-family: Arial ,sans-serif" id="nama"><?=strtoupper(isset($penduduk->nama_lengkap) ? $penduduk->nama_lengkap : $penduduk->nama );?></span></b></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="MsoNormal">
                    <span style="font-family: Arial ,sans-serif" >
                        Tempat tanggal lahir</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="ttl"><?=isset($penduduk->tempat_lahir) ? strtoupper($penduduk->tempat_lahir . ' , ' . date("d-m-Y",strtotime($penduduk->tanggal_lahir))) : $penduduk->ttl ;?></span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">
                        Jenis Kelamin</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="jenis_kelamin"><?=$penduduk->jenis_kelamin?></span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">Pekerjaan
                    </span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="pekerjaan"><?=$penduduk->pekerjaan?></span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif"></span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">Status
                    </span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="status_perkawinan"><?=$penduduk->status_perkawinan?></span>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">
                        Kebangsaan </span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="kebangsaan">INDONESIA</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">
                        Agama</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="agama"><?=$penduduk->agama?></span>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">
                        Alamat Asal </span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                 <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="alamat_asal">
                <?=isset( $penduduk->rt) ? $penduduk->alamat .' , RT '. $penduduk->rt .' / RW '.$penduduk->rw : $penduduk->alamat_asal?>
                </span></p>
            </td>
        </tr>
    </tbody>
</table>

<p class="MsoNormal" style="text-align:justify"><span style="font-family: Arial ,sans-serif">&nbsp;</span></p>
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="margin-left:.9pt;border-collapse:collapse">
    <tbody width="100%">
        <tr>
            <td width="258" valign="top" style="width:193.5pt;padding">
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">
                        Kelurahan Tujuan Pindah </span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="kelurahan_baru"><?=$penduduk->kelurahan_baru ?></span></p>
            </td>
        </tr>

            <tr>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">
                        Kota Tujuan Pindah </span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif">:</span></p>
            </td>
            <td>
                <p class="MsoNormal"><span style="font-family: Arial ,sans-serif" id="kota_baru"><?=$penduduk->kota_baru?></span></p>
            </td>
        </tr>
    </tbody>
</table>

<p class="MsoNormal"><span style="font-family: Arial ,sans-serif">&nbsp;</span></p>

<p class="MsoNormal" style="line-height:150%"><span style="font-family: Arial ,sans-serif">Demikian
        surat keterangan ini dibuat dan diberikan
        kepada yang bersangkutan untuk dipergunakan seperlunya.</span></p>

<p class="MsoNormal"><span style="font-family: Arial ,sans-serif">&nbsp;</span></p>

<p class="MsoNormal"><span style="font-family: Arial ,sans-serif">&nbsp;</span></p>

<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="margin-left:239.3pt;border-collapse:collapse">
    <tbody>
        <tr>
            <td width="293" valign="top" style="width:219.7pt;padding:0in 5.4pt 0in 5.4pt">
                <p class="MsoNormal" align="center" style="text-align:center"><span style="font-family: Arial ,sans-serif">Long Titi, </span>
                <span style="font-family: Arial ,sans-serif"><?=$today_date?></span></p>
                <p class="MsoNormal" align="center" style="text-align:center">
                <span style="font-family: Arial ,sans-serif">Kepala Desa Long Titi</span></p>  
                        <? if(isset($dataSurat->no_surat)) {?>
                        <span style="text-align: center;margin-left:70pt;margin-bottom:0pt;"> 
                        <img height="100px" src="<?=base_url('assets/img/ttd.png')?>"></span></p>
                        <p class="MsoNormal" align="center" style="text-align:center">
                        <b> <u> <span style="font-family: Arial ,sans-serif">
                        <?=strtoupper($kepala_desa->nama);?>
                        </span> </u>
                        </b>
                        </p>
                        <?} else {?>
                        <p class="MsoNormal" align="center" style="text-align:center">
                        <span style="font-family: Arial ,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="text-align:center"><span
                                style="font-family: Arial ,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="text-align:center"><span
                                style="font-family: Arial ,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="text-align:center">
                        <span style="font-family: Arial ,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="text-align:center">
                        <b> <u> <span style="font-family: Arial ,sans-serif">
                        <?=strtoupper($kepala_desa->nama);?>
                        </span> </u>
                        </b>
                        </p>
                        <?};?>
            </td>
        </tr>
    </tbody>
</table>

<p class="MsoNormal" style="text-align:justify;text-justify:kashida;text-kashida:0%"><span lang="SV" style="font-size:11.0pt;font-family: Arial ,sans-serif">&nbsp;</span></p>

</div>




</body>

</html>