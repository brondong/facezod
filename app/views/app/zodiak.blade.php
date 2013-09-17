          <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary btn-s" id="zodiak" data-zodiak="{{ $zodiak }}">{{ $zodiak }}</button>
            <button type="button" class="btn btn-primary btn-s dropdown-toggle" data-toggle="dropdown">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a onclick="zodiak(this)" data-zodiak="Aries">Aries</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Taurus">Taurus</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Gemini">Gemini</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Cancer">Cancer</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Leo">Leo</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Virgo">Virgo</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Libra">Libra</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Scorpio">Scorpio</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Sagitarius">Sagitarius</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Capricorn">Capricorn</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Aquarius">Aquarius</a></li>
              <li><a onclick="zodiak(this)" data-zodiak="Pisces">Pisces</a></li>
            </ul>
          </div>

          <h1 class="panel-title"><strong>{{ $zodiak }}</strong> <small>{{ $now }}</small></h1>