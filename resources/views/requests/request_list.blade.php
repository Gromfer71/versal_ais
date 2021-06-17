@extends('layouts.app')


@section('content')



    <div id="currencies" class="uk-align-center text-center uk-position-center"></div>


    <script>

        let x = "{{ $data }}"


        data = x.replace(/&quot;/g, '"')
        data = data.replace(/[\r\n]/g," ");
        data = data.replace(/\\|\//g,'');
        console.log(data)
        data = JSON.parse(data)

        document.addEventListener("DOMContentLoaded", function() {
            new FancyGrid({
                renderTo: 'currencies',
                width: 'fit',
                height: 800,
                defaults: {
                    sortable: true,
                    width: 200,
                },
                paging: {
                    pageSize: 20,
                },

                tbar: [{
                    type: 'search',
                    width: 350,
                    emptyText: 'Search',
                    paramsMenu: true,
                    paramsText: 'Parameters'
                }],
                data: data,
                columns: [{
                    index: 'id',
                    title: 'ID',
                    type: 'string',

                },{
                    index: 'phone',
                    title: 'Номер клиента',
                    type: 'string',

                },{
                    index: 'tour_id',
                    title: 'Номер тура',
                    type: 'string',
                    render: function (o) {
                        o.value = '<a href="tour/' + o.data.tour_id + '">' + o.value + '</a>'
                        return o;
                    }

                },{
                    index: 'created_at',
                    title: 'Дата создания',
                    type: 'string',
                },
                ]
            });
        });

    </script>
@endsection
