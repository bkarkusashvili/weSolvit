@extends('layouts.front')


@section('content')
    <section class="front-top-part container row">
        <div class="col-8 front-top-part-info">
            <h1>ერთად გავუმკლავდეთ IT პრობლემებს</h1>
            <p>
                ჩვენ თანადგომას ვუცხადებთ ქვეყანაში მოქმედ ორგანიზაციებს და კომპანიებს. თუ გჭირდებათ რჩევა დისტანციურ მუშაობასთან, ინფორმაციულ ტექნოლოგიებთან, ან უსაფრთხოებასთან დაკავშირებით:
            </p>
            <ul>
                <li>
                    <div>
                        <i class="circle"></i>
                        <i class="line"></i>
                    </div>
                    <span>მოგვწერეთ თქვენი პრობლემის შესახებ</span>
                </li>
                <li>
                    <div>
                        <i class="circle"></i>
                        <i class="line"></i>
                    </div>
                    <span>მოგვაწოდეთ საკონტაქტო ინფორმაცია</span>
                </li>
                <li>
                    <div>
                        <i class="circle"></i>
                    </div>
                    <span>დაგიბრუნდებით პასუხით 1 დღის ვადაში</span>
                </li>
            </ul>
        </div>
        <div class="col-4 front-ticket">
            <div class="we-block">
                <div class="we-group mb-2">
                    <label>აღწერე შენი პრობლემა</label>
                    <textarea name="" class="we-control" placeholder="პრობლემის აღწერა..."></textarea>
                    <span class="we-alert we-hint">მაქსიმუმ 1000 სიმბოლო</span>
                </div>
                <div class="we-group d-flex justify-content-end">
                    <button class="we-btn we-arr-right" disabled>
                        <span>გაგზავნა</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="front-partner container-fluid" id="partners">
        <div class="container">
            <h3>შემოგვიერთდი</h3>
            <div class="list row mx-2">
                <div class="col-2 px-2">
                    <div class="wrap">
                        <img src="images/solvit.png" alt="">
                    </div>
                </div>
                <div class="col-2 px-2">
                    <div class="wrap">
                        <img src="images/solvit.png" alt="">
                    </div>
                </div>
                <div class="col-2 px-2">
                    <div class="wrap">
                        <img src="images/solvit.png" alt="">
                    </div>
                </div>
                <div class="col-2 px-2">
                    <div class="wrap">
                        <img src="images/solvit.png" alt="">
                    </div>
                </div>
                <div class="col-2 px-2">
                    <div class="wrap">
                        <img src="images/solvit.png" alt="">
                    </div>
                </div>
                <div class="col-2 px-2">
                    <div class="wrap">
                        <img src="images/solvit.png" alt="">
                    </div>
                </div>
            </div>
            <p>
                თუ თქვენ ხართ IT კომპანია ან ფრილანსერი, გინდათ ჩაერთოთ ამ სამოქალაქო ინიციატივაში და დაეხმაროთ სხვებს, დარეგისტრირდით და შემოგვიერთდით
            </p>
            <a href="{{ route('register') }}" class="we-btn we-arr-right">
                <span>ვუერთდები ინიციატივას</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>
    <section class="front-stats container-fluid">
        <div class="stat-item">
            <span class="text-red">421</span>
            დაფიქსირებული საკითხი
        </div>
        <div class="stat-item">
            <span class="text-yellow">63</span>
            დაწყებული პროცესი
        </div>
        <div class="stat-item">
            <span class="text-green">111</span>
            გადაჭრილი პრობლემა
        </div>
    </section>
@endsection