@extends('layouts.home-header')
@section('content')
<div class="row px-5 bg-white">
    <div class="col-2 border-end flex p-0">
    <div class="flex-grow-1 flex-shrink-0 py-3 bg-white float-end" >
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none">
            <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-5 fw-semibold">Collapsible</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false"><i class="fas fa-home"></i> 
                    Home
                </button>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"><i class="fas fa-globe-americas"></i>
                Pubic
                </button>
                <div class="collapse ps-5 show" id="dashboard-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="p-2 bg-light"><a href="#" class="link-dark rounded">Questions</a></li>
                        <li class="p-2"><a href="#" class="link-dark rounded">Tags</a></li>
                        <li class="p-2"><a href="" class="link-dark rounded">Users</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false"><i class="fas fa-newspaper"></i>
                News
            </button>
            <div class="collapse ps-5" id="orders-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li class="mb-3"><a href="#" class="link-dark rounded">New</a></li>
                    <li class="mb-3"><a href="#" class="link-dark rounded">Processed</a></li>
                    <li class="mb-3"><a href="#" class="link-dark rounded">Shipped</a></li>
                    <li class="mb-3"><a href="#" class="link-dark rounded">Returned</a></li>
                </ul>
            </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
            <button class="btn  align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
            </button>
            <div class="collapse" id="account-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark rounded">New...</a></li>
                    <li><a href="#" class="link-dark rounded">Profile</a></li>
                    <li><a href="#" class="link-dark rounded">Settings</a></li>
                    <li><a href="#" class="link-dark rounded">Sign out</a></li>
                </ul>
            </div>
            </li>
        </ul>
    </div>
    </div>
    <div class="col-10 p-3">
        <div class="border-bottom pb-3">
            <div class="d-flex">
                <h2 class="flex-grow-1">Why this Promise chaining output order in this way?</h2>
                <a href="{{ route('questions.ask') }}" class="btn btn-primary">Ask Question</a>
            </div>
            <div class="d-flex">
                <div class="d-flex me-3">
                    <span class="text-mute">Asked</span>
                    <div class="ms-1">
                        today
                    </div>
                </div>
                <div class="d-flex">
                    <span class="text-mute">Active</span>
                    <div class="ms-1">
                        today
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-9">
                <div class="d-flex border-bottom">
                    <div class="d-flex flex-column align-items-center pe-2 fs-3">
                        <div class=""><i class="fas fa-sort-up"></i></div>
                        <div class="">0</div>
                        <div class=""><i class="fas fa-sort-down"></i></div>
                        <div class=""><i class="far fa-bookmark"></i></div>
                        <div class=""><i class="far fa-flag"></i></div>
                    </div>
                    <div class="content-question flex-grow-1 d-flex flex-column px-2">
                        <div class="mb-3">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam deserunt quidem illum, omnis eius corrupti sapiente expedita suscipit dignissimos et rerum laboriosam culpa, non praesentium excepturi id, minus beatae quod consectetur fuga perspiciatis ullam. Eveniet explicabo dolorum enim, minima quasi dolorem atque perferendis nisi magnam architecto velit ratione rem facere doloremque in vitae accusamus iure error fugiat! Dicta animi laudantium totam voluptas cumque nostrum, similique, aspernatur at non porro quo optio molestiae eveniet. Ad beatae consequatur sapiente, minus incidunt maxime! Iure dolor doloremque exercitationem laudantium minus dolorum vel natus placeat praesentium! Cumque modi molestias, fugit adipisci nulla consequuntur quis officia.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, inventore voluptatibus facere reiciendis illum assumenda molestias! Illo corrupti atque fugiat quidem similique quos optio, voluptate, quam voluptatem ducimus, aspernatur deleniti. Aperiam distinctio, consectetur iste rerum fuga dolorem laudantium harum est voluptatem libero nesciunt perferendis accusantium quod beatae natus, odit maxime officiis quos reiciendis hic officia fugit esse itaque doloribus? Ea nesciunt perferendis natus, ab numquam minima sunt non eos in illum expedita officia autem repellendus porro, ratione ad laboriosam id similique voluptas sequi, voluptate fuga quo. Suscipit harum, dignissimos ut voluptate libero ex quia, repellat sint, provident dolorem corporis sequi?
                        </div>
                        <div class="d-flex mb-5">
                            <a class="py-1 px-2 me-3 bg-warning">javascript</a>
                            <a class="py-1 px-2 me-3 bg-warning">java</a>
                            <a class="py-1 px-2 me-3 bg-warning">html</a>
                        </div>
                        <div class="d-flex pb-3">
                            <div class="flex-grow-1">
                                <a href="" class="me-2">Share</a>
                                <a href="" class="me-2">Follow</a>
                            </div>
                            <div class="border shadow-sm" style="width: 250px">
                                <div class="bg-light p-2">
                                    <div class="">
                                        asked <span>1min</span> ago
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://lh3.googleusercontent.com/ogw/ADea4I4x_rnFCrUInFF5zl7SHgjGxAFbKl-SvcSBpu0yRQ=s32-c-mo" alt="" style="width:35px; height:35px" class="me-2">
                                        <div class="">
                                            <a href="">nghiatitan</a>
                                            <div class="count-ques">12</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-primary p-2 text-white">
                                    <i class="fas fa-hand-sparkles"></i> New contributor
                                </div>
                            </div>
                        </div>
                        <div class="ps-3">
                        @for($i=1; $i<5; $i++)
                        <div class="border-top py-2">
                            <div class="d-flex">
                                <a href="" class="me-2">nghiatitan</a>
                                <span class="text-muted fs-6">21/11/2021 at 17:59</span>
                            </div>
                            <div class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati ipsam sapiente explicabo iure, enim quaerat error quos perspiciatis beatae neque.</div>
                        </div>
                        @endfor
                        </div>
                        <div class="border-top py-3">
                            <a>Add a comment</a>
                        </div>
                    </div>
                </div>
                <div class="py-3">
                    <form>
                        <div class="mb-3">
                            <label for="" class="form-label fs-4">Your Answer
                            </label>
                            <div id="editor" style="height: 200px"></div>

                            </div>
                        <button type="submit" class="btn btn-primary">Post your question</button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt, illo aspernatur odio ratione velit facilis optio expedita pariatur. Obcaecati, voluptatem sequi saepe eligendi voluptates voluptatum minus ratione accusantium minima tempore?
            </div>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection