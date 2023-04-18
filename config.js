function logout() {
    Swal.fire({
        title: 'Anda yakin?',
        icon: 'warning',
        width: '24em',
        background: '#333',
        color: 'white',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.assign("logout.php");
        }
    });
}