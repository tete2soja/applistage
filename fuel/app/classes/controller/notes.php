<?php
class Controller_Notes extends Controller_Template{

	public function action_index()
	{
		$data['notes'] = Model_Note::find_all();
		$this->template->title = "Notes";
		$this->template->content = View::forge('notes/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('notes');

		$data['note'] = Model_Note::find_by_pk($id);

		$this->template->title = "Note";
		$this->template->content = View::forge('notes/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Note::validate('create');
			
			if ($val->run())
			{
				$note = Model_Note::forge(array(
					'titre' => Input::post('titre'),
					'description' => Input::post('description'),
				));

				if ($note and $note->save())
				{
					Session::set_flash('success', 'Added note #'.$note->id.'.');
					Response::redirect('notes');
				}
				else
				{
					Session::set_flash('error', 'Could not save note.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Notes";
		$this->template->content = View::forge('notes/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('notes');

		$note = Model_Note::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Note::validate('edit');

			if ($val->run())
			{
				$note->titre = Input::post('titre');
				$note->description = Input::post('description');

				if ($note->save())
				{
					Session::set_flash('success', 'Updated note #'.$id);
					Response::redirect('notes');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('note', $note, false);
		$this->template->title = "Notes";
		$this->template->content = View::forge('notes/edit');

	}

	public function action_delete($id = null)
	{
		if ($note = Model_Note::find_one_by_id($id))
		{
			$note->delete();

			Session::set_flash('success', 'Deleted note #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete note #'.$id);
		}

		Response::redirect('notes');

	}


}
