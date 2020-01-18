<?php


namespace App\Services;


use App\Patent;
use App\PatentNotice;
use Chumper\Zipper\Zipper;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class NoticeServer
{
    public function importNoticeFile(UploadedFile $file,$user_id)
    {
        $zipper = new Zipper();
        $zipper = $zipper->make($file->getRealPath());
        $lists = $zipper->listFiles();
        libxml_disable_entity_loader(true);
        $data= [];
        foreach($lists as $list){
            if(strstr($list,'list.xml')){
                $xml = simplexml_load_string($zipper->getFileContent($list));
                $xml_data = json_decode(json_encode($xml),true);
                $data[] = [
                    'notice_serial'=>$xml_data['FAWENXLH'],
                    'notice_sid'=>$xml_data['TONGZHISID'],
                    'notice_name'=>$xml_data['TONGZHISXJ']['SHUXINGXX']['TONGZHISMC'],
                    'notice_date'=>$xml_data['TONGZHISXJ']['SHUXINGXX']['FAWENR'],
                    'notice_file'=>'notices/'.$user_id.'/'.$xml_data['TONGZHISID'],
                    'notice_type'=>$xml_data['TONGZHISXJ']['SHUXINGXX']['FAMINGLX'],

                    'patent_name'=>$xml_data['TONGZHISXJ']['SHUXINGXX']['FAMINGMC'],
                    'patent_sn' =>$xml_data['TONGZHISXJ']['SHUXINGXX']['SHENQINGH'],
                    'apply_date'=>$xml_data['TONGZHISXJ']['SHUXINGXX']['SHENQINGR'],
                ];
            }
        }
        foreach($data as $item){
            $this->addNotcie($item,$user_id);
            $zipper->extractTo(storage_path('/').'notices/'.$user_id);
        }
        $zipper->close();
    }
    public function addNotcie($data,$user_id)
    {
        $patent = Patent::firstOrCreate([
            'user_id'=>$user_id,
            'patent_sn'=>trim($data['patent_sn'])
        ],[
            'patent_name'=>$data['patent_name'],
            'patent_sn'=>$data['patent_sn'],
            'apply_date'=>$data['apply_date'],
            'patent_type_id'=>$data['notice_type']+1,
            'patent_person'=>'',
            'patent_case_id'=>1,
        ]);
        if($patent){
            PatentNotice::updateOrCreate([
                'notice_serial'=>$data['notice_serial'],
                'user_id'=>$user_id
            ],[
                'notice_serial'=>$data['notice_serial'],
                'notice_sid'=>$data['notice_sid'],
                'notice_name'=>$data['notice_name'],
                'notice_date'=>$data['notice_date'],
                'notice_file'=>$data['notice_file'],
                'notice_type'=>$data['notice_type'],
                'user_id'=>$user_id,
                'patent_id'=>$patent->id
            ]);
        }
    }
}
