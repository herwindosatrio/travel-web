document.addEventListener('DOMContentLoaded', function () {
  const panjangInputMax = document.getElementById('username').maxLength;
  document.getElementById('sisaKarakter').innerText = panjangInputMax;

  document.getElementById('username').addEventListener('input', function () {
    const jumlahKarakterDiketik = document.getElementById('username').value.length;
    const jumlahKarakterMaksimal = document.getElementById('username').maxLength;

    console.log('jumlahKarakterDiketik: ', jumlahKarakterDiketik);
    console.log('jumlahKarakterMaksimal: ', jumlahKarakterMaksimal);
    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
    document.getElementById('sisaKarakter').innerText = sisaKarakterUpdate.toString();

    if (sisaKarakterUpdate === 0) {
      document.getElementById('sisaKarakter').innerText = 'Batas maksimal tercapai!';
    } else if (sisaKarakterUpdate <= 5) {
      document.getElementById('notifikasiSisaKarakter').style.color = 'red';
    } else {
      document.getElementById('notifikasiSisaKarakter').style.color = 'black';
    }
  })

  document.getElementById('username').addEventListener('focus', function () {
    console.log('username: focus');
    document.getElementById('notifikasiSisaKarakter').style.visibility = 'visible';
  });

  document.getElementById('username').addEventListener('blur', function () {
    console.log('username: blur');
    document.getElementById('notifikasiSisaKarakter').style.visibility = 'hidden';
  });

});