<div class="main-right">
    <!-- ..............Start Message............ -->

    <div class="messages">
        <!-- ....Message top..... -->
        <div class="message-top">
            <h4>Last Activities</h4>
        </div>
        <!-- ....Searchbar... -->
        <div class="messge-serch-bar"></div>
        <!-- ......Message..... -->
        @foreach ($activities as $item)
        <div class="message">
            <div class="profile-picture">
                <img src="{{ file_exists(public_path('storage/member/' . $item->image)) ? asset('storage/member/' . $item->image) : asset('assets/img/avatars/no.png') }}" alt="">
            </div>
            <div class="message-body">
                @php
                    $parts = explode(' ', $item->name);
                    $posted = new DateTime(substr($item->created_at, 0, 10));
                @endphp
                <p><b>{{ (strlen($item->name) > 20) ? $parts[0] . ' ' . $parts[1] : $item->name }}</b> <small class="text-gry"> {{ $posted->format('M, j') }}</small></p>
                <p>{{ ucwords($item->project_name) }}</p>
                <p><a href="{{ ($item->media == "Instagram" || $item->media == "Tiktok") ? '/instagram?creator=' . $item->task_id : '/?creator=' . $item->task_id }}">{{ ucwords($item->task) }}</a></p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- ..............End Message............ -->


    <!-- ..............Start Firend Request............ -->
    <div class="firend-rquest" style="display: none">
        <h4>Request</h4>
        <div class="request">
            <div class="info">
                <div class="profile-picture">
                    <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
                </div>
                <div>
                    <h5>Dnne Danele</h5>
                    <p class="text-gry">
                        4 mutual firend
                    </p>
                    <small class="text-gry alert" >You have accepted request</small>
                </div>
            </div>
            <div class="action">
                <div class="btn btn-primary" id="Accept">
                    Accept
                </div>
                <div class="btn btn-danger" id="Delete">
                    Delete
                </div>
            </div>
        </div>
        <div class="request">
            <div class="info">
                <div class="profile-picture">
                    <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
                </div>
                <div>
                    <h5>Hija Binte</h5>
                    <p class="text-gry">
                        2 mutual firend
                    </p>
                    <small class="text-gry alert" >You have accepted request</small>
                </div>
            </div>
            <div class="action">
                <div class="btn btn-primary" id="Accept">
                    Accept
                </div>
                <div class="btn btn-danger" id="Delete">
                    Delete
                </div>
            </div>
        </div>
        <div class="request">
            <div class="info">
                <div class="profile-picture">
                    <img src="{{ asset('assets/img/avatars/no.png') }}" alt="">
                </div>
                <div>
                    <h5>Even loise</h5>
                    <p class="text-gry">
                        4 mutual firend
                    </p>
                    <small class="text-gry alert" >You have accepted request</small>
                </div>
            </div>
            <div class="action">
                <div class="btn btn-primary" id="Accept">
                    Accept
                </div>
                <div class="btn btn-danger" id="Delete">
                    Delete
                </div>
            </div>
        </div>
    </div>
    <!-- ..............End Firend Request............ -->

</div>
