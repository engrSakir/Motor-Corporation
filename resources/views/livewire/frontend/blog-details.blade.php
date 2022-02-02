<div>
    <!-- Back to top button -->
    <div class="content">
        {{-- Main Banner Custom Image --}}
        @if($blog->image)
        <img src="{{ asset($blog->image) }}" alt="" class="cover_video" style="margin-bottom: 50px;">
        <article class="col-12" style="text-align: center ; margin-bottom:50px;">
            <h3 class="tm-mb-2 tm-title-color">
                <tr>
                    <td><strong>Blog Title: </strong> </td>
                    <td>{{ $blog->title }}</td>
                </tr>
            </h3>
            <h4>
                <tr>
                    <td><strong>Blog Description </strong> </td>
                    <td>{{ $blog->description }}</td>
                </tr>
            </h4>
        </article>
        @endif
    </div>


    <div>
        @foreach($blog_images as $blog_image)
        <div class="col-xs-12 col-sm-12 col-md-4" style="margin-bottom: 100px;">
            <div class="row">
                <a href="{{ asset($blog_image->image) }}">
                    <div class="image-thumb">
                        <img src="{{ asset($blog_image->image) }}" alt="" style="width:100%; height:100%;">
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    body {
        background: whitesmoke;
    }

    .content {
        color: black;
    }

    .image-thumb {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .image_spacification {
        font-family: Roboto, sans-serif;
        font-weight: 300;
        color: #fff;
        font-size: 2rem;
        letter-spacing: 1px;
        line-height: 30px;
    }

    .bg-white {
        background-color: white;
    }

    .bg-dark {
        background-color: black;
    }

    .bg-gray {
        background-color: #241F20;
    }

    .text-dark {
        color: black;
    }

    .gallery {
        height: 100%;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    button:focus {
        outline: none;
    }

    .tm-mb-0 {
        margin-bottom: 0;
    }

    .tm-mb-1 {
        margin-bottom: 20px;
    }

    .tm-mb-2 {
        margin-bottom: 40px;
    }

    .tm-mb-3 {
        margin-bottom: 60px;
    }

    .tm-mb-4 {
        margin-bottom: 30px;
    }

    .text-center {
        text-align: center;
    }

    .tm-img-responsive {
        max-width: 100%;
        height: auto;
        width: 100%;
        height: 100%;
        /* margin-left: 80px;
            margin-top: 30px; */
    }

    .margin {
        margin-bottom: 20px;

    }

    .tm-img-responsive1 {
        max-width: 100%;
        height: 80%;
        width: 80%;
        height: 100%;
        margin-left: 80px;
        margin-top: 30px;
    }

    .tm-section-1-l {
        width: 57.85%;
        margin-right: 1.65%;
        align-items: center;
    }

    .tm-section-1-r {
        padding: 50px 40px;
        width: 40.5%;
    }

    .tm-row {
        display: flex;
    }

    .tm-btn {
        display: inline-block;
        padding: 15px 40px;
        font-size: 1.1rem;
        border: none;
        background-color: #CC9999;
        color: white;
    }

    .tm-btn:hover {
        color: white;
        background-color: #875959;
    }

    .tm-section-2-l {
        width: 40.5%;
        margin-right: 1.65%;
    }

    .tm-section-2-r {
        width: 57.85%;
        margin-bottom: 50px;
    }

    .tm-box-pad {
        padding: 40px 50px;
    }

    #button {
        padding-top: 1px;
        display: inline-block;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.5);
        width: 40px;
        height: 40px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s,
            opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }

    #button:hover {
        cursor: pointer;
        background-color: #333;
    }

    #button:active {
        background-color: #555;
    }

    #button.show {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 992px) {

        .tm-section-1-l,
        .tm-section-1-r,
        .tm-section-2-l,
        .tm-section-2-r {
            width: 100%;
        }

        .tm-section-1-l {
            margin-bottom: 20px;
            margin-right: 0;
            text-align: center;
            align-items: center;
            width: 100%;
        }

        .tm-section-2-l {
            margin-bottom: 20px;
            margin-right: 0;
            text-align: center;
            align-items: center;
            width: 100%;
        }

        .tm-section-1-r {
            width: 100%;
            align-items: center;
        }

        .tm-about-row,
        .tm-services-row {
            flex-direction: column;
        }
    }
</style>
</div>