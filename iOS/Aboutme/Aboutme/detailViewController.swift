//
//  detailViewController.swift
//  Aboutme
//
//  Created by Lee Hyun Jun on 02/12/2018.
//  Copyright © 2018 Lee Hyun Jun. All rights reserved.
//

import UIKit

class detailViewController: UIViewController {
    var receiveItem = ""
    var receiveItemImageFile: UIImage?
    
    @IBOutlet var lblItem: UILabel!
    @IBOutlet var imgview: UIImageView!
    override func viewDidLoad() {
        super.viewDidLoad()
        lblItem.text = receiveItem
        // Do any additional setup after loading the view.
    }
    func receiveItemImageFile(_ itemImageFile: UIImage?) {
        if let itemImgFile = itemImageFile {
            receiveItemImageFile = itemImgFile
        }
        else {
            // 기본 이미지
        }
    }
    func reciveItem(_ item: String)
    {
        receiveItem = item
    }
    override func viewWillAppear(_ animated: Bool) {
        lblItem.text = receiveItem
        imgview.image = receiveItemImageFile
        }
        
    }
    /*
    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
        // Get the new view controller using segue.destination.
        // Pass the selected object to the new view controller.
    }
    */


