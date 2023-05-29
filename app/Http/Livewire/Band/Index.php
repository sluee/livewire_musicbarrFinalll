<?php

namespace App\Http\Livewire\Band;

use App\Models\Band;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    public $band_name, $location,$rate,$genre = [''],
            $talent_fee,$founder,$description,
            $image;
            use WithFileUploads;
            use WithPagination;
            protected $paginationTheme = 'bootstrap';
    public $search, $search_band = null, $bandLocation= 'all', $Rock, $Pop, $Reggae,
            $Acoustic, $Classical, $sortRate = 0, $old_image, $new_image,
            $selectedId,$edit_id, $sortBy = 'asc', $locations;

    public function addBand(){
        $this->validate([
            'band_name'             =>['required', 'string'],
            'location'              =>['required', 'string'],
            'rate'                  =>['required', 'numeric'],
            'genre'                 =>['required', 'string'],
            'talent_fee'            =>['required', 'numeric'],
            'founder'               =>['required', 'string'],
            'description'           =>['required', 'string'],
            'image'                 =>['required', 'image'],

        ]);

        $fileUrl = $this->image->store('public/bandImgs');

        Band::create([
            'band_name'             =>$this->band_name,
            'location'              =>$this->location,
            'rate'                  =>$this->rate,
            'genre'                 =>$this->genre,
            'talent_fee'            =>$this->talent_fee,
            'founder'               =>$this->founder,
            'description'           =>$this->description,
            'image'                 =>$fileUrl,

        ]);

        session()->flash('message', 'Band successfully created.');
        return redirect('/band');
    }

    public function mount(){
        $this->locations= Band::pluck('location')->unique()->toArray();
    }

    public function loadBands(){
        $selected = [];
        $query = Band::orderBy('rate', $this->sortBy)->search($this->search);
        if($this->search_band != null){
            $query->where('band_name','like','%' .$this->search_band. '%');
        }
        if ($this->sortRate) {
            $query->where('rate', '>=', $this->sortRate);
        }
        if($this->sortBy == 'asc'){
            $query->orderBy('rate', 'asc');
        }else{
            $query->orderBy('rate', 'desc');
        }
        if ($this->bandLocation != 'all') {
            $query->where('location', $this->bandLocation);
        }
        if ($this->Rock == 'Rock' || $this->Pop == 'Pop' || $this->Reggae == 'Reggae' || $this->Acoustic == 'Acoustic' || $this->Classical == 'Classical') {
            $query->where(function ($q) use ($selected) {
                if ($this->Rock == 'Rock') {
                    $selected[] = 'Rock';
                    $q->orWhere('genre', 'Rock');
                }
                if ($this->Pop == 'Pop') {
                    $selected[] = 'Pop';
                    $q->orWhere('genre', 'Pop');
                }
                if ($this->Reggae == 'Reggae') {
                    $selected[] = 'Reggae';
                    $q->orWhere('genre', 'Reggae');
                }
                if ($this->Acoustic == 'Acoustic') {
                    $selected[] = 'Acoustic';
                    $q->orWhere('genre', 'Acoustic');
                }
                if ($this->Classical == 'Classical') {
                    $selected[] = 'Classical';
                    $q->orWhere('genre', 'Classical');
                }
            });
        }

        $bands = $query->paginate(4);
        return compact('bands');
    }

    public function editConfirmation($id){
        $band = Band::findOrFail($id);
        $this->edit_id              = $id;
        $this->band_name            = $band->band_name;
        $this->location             = $band->location;
        $this->rate                 = $band->rate;
        $this->genre                = $band->genre;
        $this->talent_fee           = $band->talent_fee;
        $this->founder              = $band->founder;
        $this->description          = $band->description;
        $this->old_image            =$band->image;

    }


    public function update($id)
    {
        $band= Band::findorFail($id);
        $this->validate([
            'band_name'             =>'required',
            'location'              =>'required',
            'rate'                  =>'required',
            'genre'                 =>'required',
            'talent_fee'            =>'required',
            'founder'               =>'required',
            'description'           =>'required',

        ]);
        $fileUrl='';
        if($this->new_image != null){
            $fileUrl = $this->new_image->store('profileImgs', 'public');
        }else{
            $fileUrl =$this->old_image;
        }
        $band->band_name            =$this->band_name;
        $band->location            =$this->location;
        $band->rate                 =$this->rate;
        $band->genre                =$this->genre;
        $band->talent_fee           =$this->talent_fee;
        $band->founder              =$this->founder;
        $band->description          =$this->description;
        $band->image                =$fileUrl;

        $result                    = $band->save();

        return redirect('/band')->with('message', 'Updated Successfully');
    }

    public $band_delete_id;
    public function deleteConfirmation($id)
    {
        $this->band_delete_id = $id;
    }

    public function deleteBandData(){
        $band = Band::where('id', $this->band_delete_id)->first();
        $band->delete();

        return redirect('/band')->with('message', 'Deleted Successfully');

        $this->band_delete_id = '';
    }

    public function resetFilter(){

        $this->search_band = '';

        $this->Rock = null;
        $this->Pop = null;
        $this->Reggae = null;
        $this->Acoustic = null;
        $this->Classical = null;

        $this->bandLocation = 'all';

        $this->sortRate = 0;
        $this->sortBy = 'asc';

    }
    public $band_show_id;
    public function view($id){

        $this->band_show_id = $id;

        $band = Band::where('id', $this->band_show_id);
    }

    public function render()
    {
        return view('livewire..band.index',  $this->loadBands());
    }
}
