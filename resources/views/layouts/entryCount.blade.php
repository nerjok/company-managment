<!-- Sesijos reikalai duomenu skaiciui -->
        <form method="post" action="/count">
        {{ csrf_field() }}
            <div class="form-group">
                <!--<label for="inputEmail3" class="col-sm-2 control-label">Nurodyti irasu skaiciu </label>
                   --> <div class="col-sm-10">
                         <select name="entryCnt">
                            <option value='2'>{{ __('Entry count')}}</option>

                                <option value='5'>5</option>
                                <option value='10'>10</option>
                                <option value='15'>15</option>
                                <option value='2'>20</option>
                                <option value='25'>25</option>
                          </select>
                          <input type='submit' value="{{ __('Save')}}" class="btn btn-default btn-xs dropdown-toggle">
                    </div>
            </div>


            
            </form>
      <div>

</div>
        @if (session('entryCount') !== null)

           <b>{{ __('Entry per page count')}}: {{ session('entryCount')}}</b>

        @endif