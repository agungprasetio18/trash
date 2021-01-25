<?php 

namespace App\Services;

use App\Models\Member;

use App\Repositories\MemberRepository;

use Yajra\Datatables\Datatables;

class MemberService {
    protected $repo;

	public function __construct(MemberRepository $repo)
	{
		$this->repo = $repo;
	}

	public function getDatatables(): Object
	{
		$datatables = Datatables::of($this->repo->get())
					->addIndexColumn()
					->addColumn('action', function ($member)
					{
						return '
							<a href="'.route('member.edit', $member->id).'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
							<button class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></button>
						';
					})
					->rawColumns(['action'])
					->make();

		return $datatables;
	}

}

 ?>