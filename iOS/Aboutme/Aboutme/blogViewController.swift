//
//  blogViewController.swift
//  Aboutme
//
//  Created by Lee Hyun Jun on 29/11/2018.
//  Copyright © 2018 Lee Hyun Jun. All rights reserved.
//

import UIKit

class blogViewController: UIViewController , UIWebViewDelegate {

    @IBOutlet weak var myWebView: UIWebView!
    @IBOutlet var myActivityIndicator: UIActivityIndicatorView!
    
    func loadWebPage(_ url: String) {
        let myUrl = URL(string: url)
        let myRequest = URLRequest(url: myUrl!)
        myWebView.loadRequest(myRequest)
    }
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        myWebView.delegate = self
        loadWebPage("http://blog.naver.com/abcde621")
        // Do any additional setup after loading the view.
    }
    func Naver() {
        loadWebPage("http://blog.naver.com/abcde621")
    }
    func Facebook() {
        loadWebPage("https://www.facebook.com/ownage22323231")
    }
    func Instagram() {
        loadWebPage("https://www.instagram.com/lee_hyun_jun_/")
    }
    func webViewDidStartLoad(_ webView: UIWebView) {
       // myActivityIndicator.startAnimating()
    }
    
    func webViewDidFinishLoad(_ webView: UIWebView) {
        //myActivityIndicator.stopAnimating()
    }
    
    @IBAction func btnStop(_ sender: UIBarButtonItem) {
        myWebView.stopLoading()
    }
    
    @IBAction func btnReload(_ sender: UIBarButtonItem) {
        myWebView.reload()
    }
    
    @IBAction func btnGoBack(_ sender: UIBarButtonItem) {
        myWebView.goBack()
    }
    
    @IBAction func btnGoForward(_ sender: UIBarButtonItem) {
        myWebView.goForward()
    }

    @IBAction func sgChangeLocation(_ sender: UISegmentedControl) {
        if sender.selectedSegmentIndex==0{
            Naver();
        }
        else if sender.selectedSegmentIndex==1{
            Facebook();
        }
        else if sender.selectedSegmentIndex==2{
            Instagram();
        }
    }
}
