<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                </div>
                {{
                    Breadcrumbs::render('dashboard')
                }}
            </div>
        </div>
        <section class="section">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">Default Layout</h4>
                </div> --}}
                <div class="card-body">
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
