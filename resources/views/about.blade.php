@extends('layouts.app')

@section('content')

  <section class="p-4 mb-2" style="max-width: 800px; margin: 0 auto;">
    @markdown
      # Welcome to PhoneProPlus!

      PhoneProPlus is an online, living phone book where any user can create an account and post records to the site for anyone to see and reference.
      Users can also post private records as a means to backup their contacts list in a safe place.
      PhoneProPlus also allows for users to save other user's created records to their profile to reference later as well.

      ### Tech

      PhoneProPlus is a web application written using the [Laravel](https://laravel.com/) framework.
      Laravel is the most popular MVC PHP framework. This application is written in version 8 of the framework.
      It users Laravel Blade, Bootstrap and Javascript on the front end.
      PHP on the backend and MYSQL for the database.

      The randomized profile picture API used is [Dicebear](https://avatars.dicebear.com/).

      The screencaps below are iframes provided by [Carbon](https://carbon.now.sh/).

      PhoneProPlus is hosted on [Heroku](https://www.heroku.com/).

      ---

      ## Web Programming @ [Rowan University](https://www.rowan.edu/)

      This application was created as my semester long programming project for Web Programming at
      Rowan University. Rowan University's Web Programming course teaches the following technologies

      - HTML / CSS
      - Javascript & Jquery
      - PHP & MYSQL

      ---

      Included below are some snippets from the application that demonstrate language features and highlights
      that were taught in the class and used to add functionality to the application.

      # Javascript
    @endmarkdown
    <iframe
      src="https://carbon.now.sh/embed?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=seti&wt=none&l=auto&width=800&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=false&pv=0px&ph=0px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%252F**%250A%2520*%2520Take%2520an%2520HTML%2520Input%2520field%2520%28textfield%252C%2520textarea%2520etc%29%2520and%2520a%2520char%2520count%2520ex%2520150%250A%2520*%2520And%2520display%2520the%2520how%2520many%2520chars%2520the%2520user%2520can%2520still%2520type%252C%2520as%2520they%2520type.%250A%2520*%252F%250A%2520function%2520displayCharsLeft%28element%252C%2520countFrom%29%2520%257B%250A%2520%2520%2520%2520var%2520textInput%2520%253D%2520element.value.length%253B%250A%2520%2520%2520%2520var%2520charactersLeft%2520%253D%2520countFrom%2520-%2520textInput%253B%250A%2520%2520%2520%2520document.getElementById%28%27charsLeft%27%29.innerHTML%2520%253D%2520%250A%2520%2520%2520%2520%2520%2520%2522Characters%2520left%253A%2520%2522%2520%252B%2520charactersLeft%253B%250A%2520%257D%2520"
      style="width: 800px; height: 260px; border:0; transform: scale(1); overflow:hidden;"
      sandbox="allow-scripts allow-same-origin">
    </iframe>
    @markdown
      This javascript function is used in a couple of places to display to the user how many characters they are able
      to type in a textarea after they begin typing. It is used in the create and edit record pages.

      # JQuery
    @endmarkdown
    <iframe
      src="https://carbon.now.sh/embed?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=seti&wt=none&l=auto&width=800&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=false&pv=0px&ph=0px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%2524%28%2522body%2522%29.on%28%27show.bs.collapse%27%252C%2520function%28e%29%2520%257B%250A%2520%2520if%28e.target.id%2520%253D%253D%2520%2522recordsCollapse%2522%29%2520%257B%250A%2520%2520%2520%2520document.getElementById%28%2522recordsButton%2522%29.innerHTML%2520%253D%2520%28%2522Collapse%2520Records%2522%29%253B%250A%2520%2520%257D%250A%257D%29%253B%250A%250A%2524%28%2522body%2522%29.on%28%27hide.bs.collapse%27%252C%2520function%28e%29%2520%257B%250A%2520%2520%2520%2520if%28e.target.id%2520%253D%253D%2520%2522recordsCollapse%2522%29%2520%257B%250A%2520%2520%2520%2520%2520%2520document.getElementById%28%2522recordsButton%2522%29.innerHTML%2520%253D%2520%28%2522Expand%2520Records%2522%29%253B%250A%2520%2520%2520%2520%257D%250A%257D%29%253B"
      style="width: 800px; height: 279px; border:0; transform: scale(1); overflow:hidden;"
      sandbox="allow-scripts allow-same-origin">
    </iframe>
    @markdown
      This Jquery snippet is what is responsible for the toggling of the main Records Table on the landing
      page of the application.

      # Example Database Migration
    @endmarkdown
    <iframe
      src="https://carbon.now.sh/embed?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=seti&wt=none&l=auto&width=800&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=false&pv=0px&ph=0px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%253C%253Fphp%250A%250Ause%2520Illuminate%255CDatabase%255CMigrations%255CMigration%253B%250Ause%2520Illuminate%255CDatabase%255CSchema%255CBlueprint%253B%250Ause%2520Illuminate%255CSupport%255CFacades%255CSchema%253B%250A%250Aclass%2520AddRecordsTable%2520extends%2520Migration%2520%257B%250A%250A%2520%2520%2520%2520public%2520function%2520up%28%29%2520%257B%250A%2520%2520%2520%2520%2520%2520%2520%2520Schema%253A%253Acreate%28%27records%27%252C%2520function%2520%28Blueprint%2520%2524table%29%2520%257B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Eid%28%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253EbigInteger%28%27user_id%27%29-%253Eunsigned%28%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Estring%28%27building_name%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Estring%28%27address%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Estring%28%27city%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Estring%28%27state%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Estring%28%27zipcode%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Estring%28%27phone_number%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253EunsignedBigInteger%28%27building_type_id%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253EunsignedBigInteger%28%27is_private%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Estring%28%27notes%27%29-%253Enullable%28%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Etimestamps%28%29%253B%250A%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Eforeign%28%27user_id%27%29-%253Ereferences%28%27id%27%29%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520-%253Eon%28%27users%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Eforeign%28%27building_type_id%27%29-%253Ereferences%28%27id%27%29%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520-%253Eon%28%27building_types%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253Eforeign%28%27is_private%27%29-%253Ereferences%28%27id%27%29%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520-%253Eon%28%27record_visibility_types%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%257D%29%253B%250A%2520%2520%2520%2520%257D%250A%250A%2520%2520%2520%2520public%2520function%2520down%28%29%2520%257B%250A%2520%2520%2520%2520%2520%2520%2520%2520%250A%2520%2520%2520%2520%2520%2520%2520%2520Schema%253A%253Atable%28%27records%27%252C%2520function%28Builder%2520%2524builder%29%2520%257B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253EdropForeign%28%27user_id%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253EdropForeign%28%27building_type_id%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2524table-%253EdropForeign%28%27is_private%27%29%253B%250A%2520%2520%2520%2520%2520%2520%2520%2520%257D%29%253B%250A%250A%2520%2520%2520%2520%2520%2520%2520%2520Schema%253A%253AdropIfExists%28%27records%27%29%253B%250A%2520%2520%2520%2520%257D%250A%257D%250A"
      style="width: 800px; height: 893px; border:0; transform: scale(1); overflow:hidden;"
      sandbox="allow-scripts allow-same-origin">
    </iframe>
    @markdown
      This is an example Laravel Database Migration. This migration in particular creates the "records" table.
      Records are the meat and potatoes of the application. A user can have many records and a record belongs to one
      user. ( Check out the relationships section below ). There are three foreign keys on this table.
      - user_id ( The user who created the record )
      - building_type_id ( Is the records location a Company or Residance )
      - is_private ( Is the visibility type of the record Public or Private )

      # Example Model
    @endmarkdown
    <iframe
      src="https://carbon.now.sh/embed?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=seti&wt=none&l=auto&width=800&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=false&pv=0px&ph=0px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%253C%253Fphp%250A%250Anamespace%2520App%255CModels%253B%250A%250Ause%2520Illuminate%255CDatabase%255CEloquent%255CFactories%255CHasFactory%253B%250Ause%2520Illuminate%255CDatabase%255CEloquent%255CModel%253B%250Ause%2520App%255CModels%255CSave%253B%250A%250Ause%2520Carbon%255CCarbon%253B%250A%250Aclass%2520Record%2520extends%2520Model%2520%257B%250A%2520%2520%2520%2520use%2520HasFactory%253B%250A%250A%2520%2520%2520%2520public%2520%2524table%2520%253D%2520%27records%27%253B%250A%2520%2520%2520%2520public%2520%2524timestamps%2520%253D%2520true%253B%250A%250A%2520%2520%2520%2520protected%2520%2524fillable%2520%253D%2520%255B%27user_id%27%252C%2520%27building_name%27%252C%2520%27address%27%252C%2520%27city%27%252C%2520%27state%27%252C%250A%2520%2520%2520%2520%2520%2520%27zipcode%27%252C%2520%27notes%27%252C%2520%27phone_number%27%252C%2520%27is_private%27%252C%2520%27building_type_id%27%255D%253B%250A%250A%2520%2520%2520%2520public%2520function%2520user%28%29%2520%257B%250A%2520%2520%2520%2520%2520%2520%2520%2520return%2520%2524this-%253EbelongsTo%28User%253A%253Aclass%29%253B%250A%2520%2520%2520%2520%257D%250A%250A%2520%2520%2520%2520public%2520function%2520buildingType%28%29%2520%257B%250A%2520%2520%2520%2520%2520%2520return%2520%2524this-%253EhasOne%28BuildingType%253A%253Aclass%252C%2520%27id%27%252C%2520%27building_type_id%27%29%253B%250A%2520%2520%2520%2520%257D%250A%250A%2520%2520%2520%2520public%2520function%2520visibilityType%28%29%2520%257B%250A%2520%2520%2520%2520%2520%2520return%2520%2524this-%253EhasOne%28VisibilityType%253A%253Aclass%252C%2520%27id%27%252C%2520%27is_private%27%29%253B%250A%2520%2520%2520%2520%257D%250A%250A%2520%2520%2520%2520public%2520function%2520getId%28%29%2520%257B%250A%2520%2520%2520%2520%2520%2520%2520%2520return%2520%2524this-%253Eid%253B%250A%2520%2520%2520%2520%257D%250A%2520%2520..."
      style="width: 800px; height: 725px; border:0; transform: scale(1); overflow:hidden;"
      sandbox="allow-scripts allow-same-origin">
    </iframe>
    @markdown
      This is an example Laravel Model. A model is what represents the database table through code.
      The Model has a table it represents, a $fillable which has the fillable fields and relationships and other methods.

      For example:
      - A record belongsTo a User.
      - A record hasOne VisibilityType.
      - A record hasOne BuildingType.

      # Example Controller Functionality
    @endmarkdown
    <iframe
      src="https://carbon.now.sh/embed?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=seti&wt=none&l=auto&width=800&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=false&pv=0px&ph=0px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%253C%253Fphp%250A%250Anamespace%2520App%255CHttp%255CControllers%253B%250A%250Ause%2520App%255CHttp%255CRequests%255CCreateRecordRequest%253B%250Ause%2520Illuminate%255CHttp%255CRequest%253B%250A%250Ause%2520App%255CModels%255CBuildingType%253B%250Ause%2520App%255CModels%255CVisibilityType%253B%250Ause%2520App%255CModels%255CRecord%253B%250Ause%2520App%255CRules%255CPhoneNumber%253B%250A%250Aclass%2520RecordController%2520extends%2520Controller%2520%257B%250A%250A%2520%2520public%2520function%2520index%28Record%2520%2524record%29%2520%257B%250A%2520%2520%2520%2520return%2520view%28%27records.index%27%252C%2520%255B%27record%27%2520%253D%253E%2520%2524record%255D%29%253B%250A%2520%2520%257D%250A%250A%2520%2520public%2520function%2520create%28%29%2520%257B%250A%2520%2520%2520%2520return%2520view%28%27records.create%27%29%253B%250A%2520%2520%257D%250A%250A%2520%2520public%2520function%2520store%28CreateRecordRequest%2520%2524request%29%2520%257B%250A%2520%2520%2520%2520%2524record%2520%253D%2520Record%253A%253Acreate%28%2524request-%253Eall%28%29%29%253B%250A%2520%2520%2520%2520return%2520redirect%28%27home%27%29-%253Ewith%28%255B%27success%27%2520%253D%253E%2520%27New%2520record%2520succesfully%2520added%21%27%255D%29%253B%250A%2520%2520%257D"
      style="width: 800px; height: 558px; border:0; transform: scale(1); overflow:hidden;"
      sandbox="allow-scripts allow-same-origin">
    </iframe>
    @markdown
      Here is a piece of the Records Controller. These are the functions that are called when a specific route is
      accessed by an authorzied user.

      ---

      #### View all of the source code here:

      [![kylenotfound - PhoneProPlus](https://img.shields.io/static/v1?label=kylenotfound&message=PhoneProPlus&color=blue&logo=github)](https://github.com/kylenotfound/PhoneProPlus "Go to GitHub repo")
    @endmarkdown
  </section>
@endsection
