{{-- bootstrap bundle --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

{{-- local scripts --}}
<script src="{{ asset('js/scripts.js') }}"></script>

{{-- tables (no idea about its operation) --}}
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>

{{-- Chart.js library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

{{-- charts handle --}}
<script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>

{{-- show password btn --}}
<script>
    $(document).ready( () => {
        $('.showPassBtn').each((i, elem) => {
            $(elem).click((e) => {
                let elems = $(e.target).siblings();

                if(elems.length == 0) {
                    elems = $(e.target).parent().siblings();
                }

                elems.each((i, elem) => {
                    if(elem.tagName == 'INPUT'){
                        let type = elem.getAttribute('type');

                        if(type == 'password') elem.setAttribute('type', 'text');
                        else elem.setAttribute('type', 'password');

                        return false;
                    }
                });
            });
        });

        $(".timer-5s").each((i, elem) => {
            setTimeout(() => {
                $(elem).addClass('d-none')
            }, 5000);
        })
    });
</script>
